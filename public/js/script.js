class SongCatalog {
    constructor(root) {
        this.root = root;
        this.table = root.closest(".catalog")?.querySelector("[data-song-catalog]");
        this.body = this.table?.querySelector("tbody");
        this.search = root.querySelector('[data-filter="search"]');
        this.genre = root.querySelector('[data-filter="genre"]');
        this.yearFrom = root.querySelector('[data-filter="year-from"]');
        this.yearTo = root.querySelector('[data-filter="year-to"]');
        this.sort = root.querySelector('[data-filter="sort"]');
        this.count = root.querySelector("[data-result-count]");
        this.resetButton = root.querySelector("[data-filter-reset]");

        if (!this.table || !this.body || !this.search || !this.genre
            || !this.yearFrom || !this.yearTo || !this.sort || !this.count) {
            return;
        }

        this.collator = new Intl.Collator("sk", {
            sensitivity: "base",
            numeric: true,
        });
        this.rows = Array.from(this.body.querySelectorAll("tr")).map((row, index) => ({
            element: row,
            index,
            cells: Array.from(row.cells, (cell) => cell.textContent.trim()),
        }));
        this.noResultsRow = document.createElement("tr");
        this.noResultsCell = document.createElement("td");
        this.noResultsCell.colSpan = this.table.tHead.rows[0].cells.length;
        this.noResultsCell.textContent = "Zadaným filtrom nezodpovedá žiadna skladba.";
        this.noResultsRow.append(this.noResultsCell);
        this.noResultsRow.hidden = true;

        this.populateGenres();
        this.bindEvents();
        this.update();
    }

    normalize(value) {
        return value
            .toLocaleLowerCase("sk")
            .normalize("NFD")
            .replace(/[\u0300-\u036f]/g, "")
            .trim();
    }

    populateGenres() {
        const genres = new Set(
            this.rows.map(({ cells }) => cells[3]).filter((genre) => genre !== "—"),
        );
        Array.from(genres)
            .sort((first, second) => this.collator.compare(first, second))
            .forEach((genre) => {
                const option = document.createElement("option");
                option.value = genre;
                option.textContent = genre;
                this.genre.append(option);
            });
    }

    bindEvents() {
        [this.search, this.genre, this.yearFrom, this.yearTo, this.sort]
            .forEach((control) => {
                control.addEventListener("input", () => this.update());
                control.addEventListener("change", () => this.update());
            });
        this.resetButton?.addEventListener("click", () => this.reset());
    }

    matches(row) {
        const searchableText = this.normalize(row.cells.slice(0, 4).join(" "));
        const query = this.normalize(this.search.value);
        const genreMatches = !this.genre.value || row.cells[3] === this.genre.value;
        const year = Number.parseInt(row.cells[4], 10);
        const hasYear = Number.isFinite(year);
        const minimum = this.yearFrom.value === "" ? null : Number(this.yearFrom.value);
        const maximum = this.yearTo.value === "" ? null : Number(this.yearTo.value);
        const minimumMatches = minimum === null || (hasYear && year >= minimum);
        const maximumMatches = maximum === null || (hasYear && year <= maximum);

        return searchableText.includes(query)
            && genreMatches
            && minimumMatches
            && maximumMatches;
    }

    compareRows(first, second) {
        const direction = this.sort.value.endsWith("-desc") ? -1 : 1;
        const field = this.sort.value.split("-")[0];
        const column = field === "title" ? 0 : field === "artist" ? 1 : 4;

        if (field === "year") {
            const firstYear = Number.parseInt(first.cells[column], 10);
            const secondYear = Number.parseInt(second.cells[column], 10);
            const firstMissing = !Number.isFinite(firstYear);
            const secondMissing = !Number.isFinite(secondYear);
            if (firstMissing !== secondMissing) {
                return firstMissing ? 1 : -1;
            }
            if (!firstMissing && firstYear !== secondYear) {
                return (firstYear - secondYear) * direction;
            }
        } else {
            const comparison = this.collator.compare(first.cells[column], second.cells[column]);
            if (comparison !== 0) {
                return comparison * direction;
            }
        }

        return first.index - second.index;
    }

    update() {
        const visibleRows = this.rows.filter((row) => this.matches(row));
        if (this.sort.value === "original") {
            visibleRows.sort((first, second) => first.index - second.index);
        } else {
            visibleRows.sort((first, second) => this.compareRows(first, second));
        }

        visibleRows.forEach(({ element }) => {
            element.hidden = false;
            this.body.append(element);
        });
        this.rows
            .filter((row) => !visibleRows.includes(row))
            .forEach(({ element }) => {
                element.hidden = true;
                this.body.append(element);
            });

        this.noResultsRow.hidden = visibleRows.length !== 0;
        this.body.append(this.noResultsRow);
        this.count.textContent = visibleRows.length === 1
            ? "Zobrazená 1 skladba"
            : `Zobrazených ${visibleRows.length} skladieb`;
    }

    reset() {
        this.search.value = "";
        this.genre.value = "";
        this.yearFrom.value = "";
        this.yearTo.value = "";
        this.sort.value = "original";
        this.update();
        this.search.focus();
    }
}

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("[data-catalog-controls]").forEach((controls) => {
        new SongCatalog(controls);
    });
});

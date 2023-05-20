/**
 * Game board.
 */
component.board = function () {
    component.apply(this, arguments);
};
assessment.extend(component.board, component);

const log = console.log;
/**
 * Decorate.
 *
 * @param {HTMLDivElement} parent
 */
component.board.prototype.decorate = function (parent) {
    const self = this;
    const container = document.createElement("div");
    container.addEventListener("keydownmove", function (event) {});

    container.id = "board";
    const character = new component.character();
    character.render(container);
    log(character);
    parent.appendChild(container);
};

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
    parent.id = "board";
    const character = new component.character();

    document.addEventListener("keydown", function (event) {
        switch (event.key) {
            case "w":
                character.move(0, -10);
                break;
            case "a":
                character.move(-10, 0);
                break;
            case "s":
                character.move(0, 10);
                break;
            case "d":
                character.move(10, 0);
                break;
            default:
        }
    });

    character.render(parent);
};

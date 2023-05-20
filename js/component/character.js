/**
 * Players' Character.
 */
component.character = function () {
    component.apply(this, arguments);
};
assessment.extend(component.character, component);

component.character.prototype.image = "images/charactdsfsdfer.png";
/**
 * Decorate.
 *
 * @param {HTMLDivElement} parent
 */
component.character.prototype.decorate = function (parent) {
    const self = this;
    const container = document.createElement("div");
    container.innerHTML = this.image;
    parent.appendChild(container);
};

/**
 * Players' Character.
 */
component.character = function () {
    component.apply(this, arguments);
    this.parent = null;
    this.image_location = "images/character.png";
    this.x = 0;
    this.y = 0;
};
assessment.extend(component.character, component);

/**
 * Decorate.
 *
 * @param {HTMLDivElement} parent
 */
component.character.prototype.decorate = function (parent) {
    this.parent = parent;
    parent.id = "character";
    parent.src = this.image_location;

    // Move to the initial position.
    this.move(50, 50);
};

/**
 * Adjust location.
 *
 * @param {Number} X
 * @param {Number} Y
 */
component.character.prototype.move = function (x, y) {
    this.x += x;
    this.y += y;

    // handle rotation
    if (x > 0) {
        this.parent.style.transform = "rotate(0deg)";
    } else if (x < 0) {
        this.parent.style.transform = "rotate(180deg)";
    } else if (y > 0) {
        this.parent.style.transform = "rotate(90deg)";
    } else if (y < 0) {
        this.parent.style.transform = "rotate(-90deg)";
    }

    // Handle boundaries.
    if (this.x < 0 - this.parent.width / 2) {
        this.x = 0 - this.parent.width / 2;
    } else if (window.innerWidth < this.x + this.parent.width / 2) {
        this.x = window.innerWidth - this.parent.width / 2;
    }
    if (this.y + this.parent.height > window.innerHeight) {
        this.y = window.innerHeight - this.parent.height;
    } else if (this.y < 0) {
        this.y = 0;
    }

    // Update position.
    this.parent.style.left = this.x + "px";
    this.parent.style.top = this.y + "px";
};

/**
 * Render the character.
 *
 * @param {HTMLElement} parent
 */
component.character.prototype.render = function (parent) {
    const container = document.createElement("img");
    this.decorate(container);
    parent.appendChild(container);
};

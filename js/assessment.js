/**
 * Namespace.
 *
 * @type {Object}
 */
var assessment = {};

/**
 * Runs when the document is fully loaded and ready to go.
 */
assessment.ready = function () {
    const stats = new component.stats();
    stats.render(document.body);
    const board = new component.board();
    board.render(document.body);
};

/**
 * Extends one class with another.
 *
 * @link https://oli.me.uk/2013/06/01/prototypical-inheritance-done-right/
 *
 * @param {Function} destination The class that should be inheriting things.
 * @param {Function} source The parent class that should be inherited from.
 *
 * @return {Object} The prototype of the parent.
 */
assessment.extend = function (destination, source) {
    destination.prototype = Object.create(source.prototype);
    destination.prototype.constructor = destination;

    return source.prototype;
};

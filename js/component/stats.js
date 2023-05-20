/**
 * Stats.
 */
component.stats = function () {
    component.apply(this, arguments);
    this.parent = null;
};
assessment.extend(component.stats, component);

/**
 * Decorate.
 *
 * @param {HTMLDivElement} parent
 */
component.stats.prototype.decorate = function (parent) {
    this.parent = parent;
    parent.innerHTML = "Loading Stats...";
    this.updateStats("impignorate");
};

/**
 * Updates stats.
 *
 * @param {string} playerName
 * @return {Object} stats
 */
component.stats.prototype.updateStats = function (playerName) {
    const parent = this.parent;
    const params = new URLSearchParams();
    params.append("playerName", playerName);

    // Ajax call to get stats
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            parent.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "api/character", true);
    xhttp.send(params);
};

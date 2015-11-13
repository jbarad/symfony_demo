var $collectionHolder;

// setup an "add a bullet" link
var $addBulletLink = $('<a href="#" class="add_bullet_link btn btn-md btn-success">Agregar</a><br /><br />');

jQuery(document).ready(function() {
    $bulletContainer = $('.bulletContainer');

    // Get the ul that holds the collection of bullets
    $collectionHolder = $('.bullets');

    // add a delete link to all of the existing bullet form li elements
    $collectionHolder.find('.bulletInput').each(function() {
        addBulletFormDeleteLink($(this));
    });

    // add the "add a bullet" anchor and li to the bullets ul
    $bulletContainer.prepend($addBulletLink);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addBulletLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new bullet form (see next code block)
        addBulletForm($collectionHolder);
    });
});

function addBulletForm($collectionHolder) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a bullet" link li
    var $newFormLi = $('<div class="bulletInput"></div>').append(newForm);
    $collectionHolder.append($newFormLi);

    // add a delete link to the new form
    addBulletFormDeleteLink($newFormLi);    
}

function addBulletFormDeleteLink($bulletFormLi) {
    var $removeFormA = $('<a href="#" class="btn btn-sm btn-danger">Eliminar</a><br /><br />');
    $bulletFormLi.append($removeFormA);

    $removeFormA.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // remove the li for the bullet form
        $bulletFormLi.remove();
    });
}
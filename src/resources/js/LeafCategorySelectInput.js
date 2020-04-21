/** global: Craft */
/** global: Garnish */
/**
 * Leaf Category Select input
 */
Craft.LeafCategorySelectInput = Craft.CategorySelectInput.extend(
    {
        getDisabledElementIds: function() {
            var ids = this.base();

            if (typeof leafCategoriesDisabledElementIds !== 'undefined') {
                ids = ids.concat(leafCategoriesDisabledElementIds);
            }

            console.log('getDisabledElementIds');
            return ids;
        },

        removeElement: function($element) {
            this.base($element);

            this.updateDisabledElementsInModal();
        },
    });

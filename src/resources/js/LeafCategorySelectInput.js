/** global: Craft */
/** global: Garnish */
/**
 * Leaf Category Select input
 */
Craft.LeafCategorySelectInput = Craft.CategorySelectInput.extend(
    {
        leafCategoriesDisabledElementIds: [],

        init: function(settings) {
            this.base(settings);

            if (typeof leafCategoriesDisabledElementIds !== 'undefined') {
                this.leafCategoriesDisabledElementIds = leafCategoriesDisabledElementIds;
            }

            this.handleElementsWithDescendants();
        },

        handleElementsWithDescendants: function() {
            this.$elementsContainer.find('.element').each((index, element) => {
                // If element has children
                if ($(element).parent().siblings('ul').length) {
                    $(element).parent().addClass('disabled');
                    $(element).find('input').first().remove();

                    // If no children are enabled then remove the element
                    // (using jQuery to avoid an infinite loop)
                    if ($(element).parent().siblings('ul').find('input:enabled').length == 0) {
                        $(element).parent().parent().remove();
                    }
                }
            });
        },

        getDisabledElementIds: function() {
            const ids = this.base();

            return ids.concat(leafCategoriesDisabledElementIds);;
        },

        onSelectElements: function (elements) {
            this.handleElementsWithDescendants();
        },

        onRemoveElements: function (elements) {
            this.handleElementsWithDescendants();

            if (this.modal) {
                this.updateDisabledElementsInModal();
            }
        },
    });

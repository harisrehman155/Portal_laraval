(function ($) {
    $(function () {
        var addFormGroup = function (event) {
            event.preventDefault();
            var index = $(this).data('index');
            var $formGroup = $(this).closest('.form-group');
            var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
            var $formGroupClone = $formGroup.clone();
            $formGroupClone.find('.input-group-select-val').attr('name', `contacts[${index}][icon]`);
            $formGroupClone.find('.link-val').attr('name', `contacts[${index}][link]`);
            
            $(this)
                .toggleClass('btn-success btn-add btn-danger btn-removed')
                .html('<i class="feather icon-minus"></i>');

            $formGroupClone.find('input').val('');
            $formGroupClone.find('.concept').text('Select Icon');
            $formGroupClone.find('.waves-ripple').remove();
            $formGroupClone.find('.btn-add').attr('data-index', parseInt(index)+1);
            
            $formGroupClone.insertAfter($formGroup);

            var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
            if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
                $lastFormGroupLast.find('.btn-add').attr('disabled', true);
            }

            
        };

        var removeFormGroup = function (event) {
            event.preventDefault();

            var $formGroup = $(this).closest('.form-group');
            var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

            var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
            if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
                $lastFormGroupLast.find('.btn-add').attr('disabled', false);
            }

            $formGroup.remove();
        };

        var selectFormGroup = function (event) {
            event.preventDefault();

            var $selectGroup = $(this).closest('.input-group-select');
            console.log($selectGroup.html());
            var param = $(this).attr("href").replace("#","");
            var concept = $(this).text();

            $selectGroup.find('.concept').html(`<i class="fa fa-${concept.toLowerCase()}"></i> ${concept}`);
            $selectGroup.find('.input-group-select-val').val(param);
            
        }

        var countFormGroup = function ($form) {
            return $form.find('.form-group').length;
        };

        $(document).on('click', '.btn-add', addFormGroup);
        $(document).on('click', '.btn-removed', removeFormGroup);
        $(document).on('click', '.dropdown-menu a', selectFormGroup);

    });
})(jQuery);
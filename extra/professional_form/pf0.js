var ProfessionSearchForm = function() {
    var getDom, initialize, initializeForm, dom;

    getDom = function() {
        return jQuery('.professional-form-container');
    };
    initialize = function(dom) {
        dom.append('<link rel="stylesheet" type="text/css" href="/wp-content/themes/oria/extra/professional_form/pf0.css"/>');
        dom.append('<link rel="stylesheet" type="text/css" href="/wp-content/themes/oria/vendor/select2/select2.css"/>');
        dom.append('<script type="text/javascript" src="/wp-content/themes/oria/vendor/select2/select2.min.js"></script>');
        dom.append('<script type="text/javascript" src="/wp-content/themes/oria/vendor/select2/select2_locale_ru.js"></script>');

        dom.append('<div class="form-container"><input type"text" name="profession_form[name]"/></div>');
    };
    initializeForm = function(dom) {
        dom.find('.form-container input').select2({
            placeholder: "Найдите свою профессию",
            language: "ru",
            theme: "classic",
            closeOnSelect: true,
            initSelection: {id: -1, text: ''},
            minimumResultsForSearch: 3,
            formatNoMatches: 'Профессия не найдена',
            ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
                url: "/wp-content/themes/oria/extra/professional_form/lookup.php",
                dataType: 'json',
                quietMillis: 250,
                data: function (term, page) {
                    return { q: term };
                },
                results: function (data, page) { // parse the results into the format expected by Select2.
                    // since we are using custom formatting functions we do not need to alter the remote JSON data
                    return { results: data };
                },
                cache: true
            },
            minimumInputLength: 1
        });

        dom.find('.form-container input').on("select2-selecting", function(e) {
            alert("Ваша профессия '" + e.choice.text + "' входит в список регулируемых.");
            console.log ("selecting val="+ e.val+" choice="+ JSON.stringify(e.choice));
        });
    };

    dom = getDom();
    if(dom.length > 0) {
        initialize(dom);
        initializeForm(dom);
    }

    return true;
};

jQuery( document ).ready(function() {

    var pf = new ProfessionSearchForm();

});
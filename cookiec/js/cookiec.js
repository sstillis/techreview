/**
 * 
 * @type {type}
 */
(function ($, Drupal, drupalSettings) {

    addEventListener("load", function () {
        //console.log(drupalSettings.drupalSettings);
        
        var cookiec_msg = drupalSettings.drupalSettings.cookiec.cookiec_msg;
        var cookiec_link = drupalSettings.drupalSettings.cookiec.cookiec_link;
        var cookiec_linkmsg = drupalSettings.drupalSettings.cookiec.cookiec_linkmsg;
        var cookiec_background = drupalSettings.drupalSettings.cookiec.cookiec_background;
        var cookiec_position = drupalSettings.drupalSettings.cookiec.cookiec_position;
        var cookiec_dismiss = drupalSettings.drupalSettings.cookiec.cookiec_dismiss;

        cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": cookiec_background,
                },
                "button": {
                    "background": "transparent",
                    "border": "#eaab00",
                    "text": "#eaab00"
                }
            },
            "content": {
                "message": cookiec_msg,
                "href": cookiec_link,
                "link": cookiec_linkmsg,
            },
            "position": cookiec_position,
            "dismissOnWindowClick": false,
            "cookie": {
                "name": 'cookie-agreed'
            },

        })

    });

})(jQuery, Drupal, this, this.document);

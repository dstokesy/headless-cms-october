/*
 * This file has been compiled from: /modules/system/lang/da/client.php
 */
if (!window.oc) {
    window.oc = {};
}

if (!window.oc.langMessages) {
    window.oc.langMessages = {};
}

window.oc.langMessages['da'] = $.extend(
    window.oc.langMessages['da'] || {},
    {"markdowneditor":{"formatting":"Formatering","quote":"Citat","code":"Kode","header1":"Overskrift 1","header2":"Overskrift 2","header3":"Overskrift 3","header4":"Overskrift 4","header5":"Overskrift 5","header6":"Overskrift 6","bold":"Fed","italic":"Skr\u00e5","unorderedlist":"Usorteret Liste","orderedlist":"Nummereret Liste","video":"Video","image":"Billede","link":"Link","horizontalrule":"Inds\u00e6t horisontal streg","fullscreen":"Fuld sk\u00e6rm","preview":"Forh\u00e5ndsvisning"},"mediamanager":{"insert_link":"Inds\u00e6t Link","insert_image":"Inds\u00e6t Billede","insert_video":"Inds\u00e6t Video","insert_audio":"Inds\u00e6t Lyd","invalid_file_empty_insert":"V\u00e6lg venligst en fil, at inds\u00e6tte et link til.","invalid_file_single_insert":"V\u00e6lg venligst en enkel fil.","invalid_image_empty_insert":"V\u00e6lg venligst et eller flere billeder, at inds\u00e6tte.","invalid_video_empty_insert":"V\u00e6lg venligst en videofil, at inds\u00e6tte.","invalid_audio_empty_insert":"V\u00e6lg venligst en lydfil, at inds\u00e6tte."},"alert":{"error":"Error","confirm":"Confirm","dismiss":"Dismiss","confirm_button_text":"OK","cancel_button_text":"Fortryd","widget_remove_confirm":"Remove this widget?"},"datepicker":{"previousMonth":"Sidste M\u00e5ned","nextMonth":"N\u00e6ste M\u00e5ned","months":["Januar","Februar","Marts","April","Maj","Juni","Juli","August","September","Oktober","November","December"],"weekdays":["S\u00f8ndag","Mandag","Tirsdag","Onsdag","Torsdag","Fredag","L\u00f8rdag"],"weekdaysShort":["S\u00f8n","Man","Tir","Ons","Tor","Fre","L\u00f8r"]},"colorpicker":{"choose":"Ok"},"filter":{"group":{"all":"Alle"},"scopes":{"apply_button_text":"Apply","clear_button_text":"Clear"},"dates":{"all":"alle","filter_button_text":"Filter","reset_button_text":"Nulstil","date_placeholder":"Dato","after_placeholder":"Efter","before_placeholder":"F\u00f8r"},"numbers":{"all":"all","filter_button_text":"Filter","reset_button_text":"Reset","min_placeholder":"Min","max_placeholder":"Max"}},"eventlog":{"show_stacktrace":"Vis stacktracen","hide_stacktrace":"Skjul stacktracen","tabs":{"formatted":"Formateret","raw":"R\u00e5"},"editor":{"title":"Kildekode redigeringsv\u00e6rkt\u00f8j","description":"Dit operativsystem b\u00f8r konfigureres til at lytte til et af disse URL-skemaer.","openWith":"\u00c5ben med","remember_choice":"Husk valgte mulighed for denne session","open":"\u00c5ben","cancel":"Fortryd"}},"upload":{"max_files":"You can not upload any more files.","invalid_file_type":"You can't upload files of this type.","file_too_big":"File is too big ({{filesize}}MB). Max filesize: {{maxFilesize}}MB.","response_error":"Server responded with {{statusCode}} code.","remove_file":"Remove file"},"inspector":{"add":"Add","remove":"Remove","key":"Key","value":"Value","ok":"OK","cancel":"Cancel","items":"Items"}}
);


//! moment.js locale configuration v2.22.2

;(function (global, factory) {
   typeof exports === 'object' && typeof module !== 'undefined'
       && typeof require === 'function' ? factory(require('../moment')) :
   typeof define === 'function' && define.amd ? define(['../moment'], factory) :
   factory(global.moment)
}(this, (function (moment) { 'use strict';


    var da = moment.defineLocale('da', {
        months : 'januar_februar_marts_april_maj_juni_juli_august_september_oktober_november_december'.split('_'),
        monthsShort : 'jan_feb_mar_apr_maj_jun_jul_aug_sep_okt_nov_dec'.split('_'),
        weekdays : 'søndag_mandag_tirsdag_onsdag_torsdag_fredag_lørdag'.split('_'),
        weekdaysShort : 'søn_man_tir_ons_tor_fre_lør'.split('_'),
        weekdaysMin : 'sø_ma_ti_on_to_fr_lø'.split('_'),
        longDateFormat : {
            LT : 'HH:mm',
            LTS : 'HH:mm:ss',
            L : 'DD.MM.YYYY',
            LL : 'D. MMMM YYYY',
            LLL : 'D. MMMM YYYY HH:mm',
            LLLL : 'dddd [d.] D. MMMM YYYY [kl.] HH:mm'
        },
        calendar : {
            sameDay : '[i dag kl.] LT',
            nextDay : '[i morgen kl.] LT',
            nextWeek : 'på dddd [kl.] LT',
            lastDay : '[i går kl.] LT',
            lastWeek : '[i] dddd[s kl.] LT',
            sameElse : 'L'
        },
        relativeTime : {
            future : 'om %s',
            past : '%s siden',
            s : 'få sekunder',
            ss : '%d sekunder',
            m : 'et minut',
            mm : '%d minutter',
            h : 'en time',
            hh : '%d timer',
            d : 'en dag',
            dd : '%d dage',
            M : 'en måned',
            MM : '%d måneder',
            y : 'et år',
            yy : '%d år'
        },
        dayOfMonthOrdinalParse: /\d{1,2}\./,
        ordinal : '%d.',
        week : {
            dow : 1, // Monday is the first day of the week.
            doy : 4  // The week that contains Jan 4th is the first week of the year.
        }
    });

    return da;

})));


/*! Select2 4.1.0-rc.0 | https://github.com/select2/select2/blob/master/LICENSE.md */

!function(){if(jQuery&&jQuery.fn&&jQuery.fn.select2&&jQuery.fn.select2.amd)var e=jQuery.fn.select2.amd;e.define("select2/i18n/da",[],function(){return{errorLoading:function(){return"Resultaterne kunne ikke indlæses."},inputTooLong:function(e){return"Angiv venligst "+(e.input.length-e.maximum)+" tegn mindre"},inputTooShort:function(e){return"Angiv venligst "+(e.minimum-e.input.length)+" tegn mere"},loadingMore:function(){return"Indlæser flere resultater…"},maximumSelected:function(e){var n="Du kan kun vælge "+e.maximum+" emne";return 1!=e.maximum&&(n+="r"),n},noResults:function(){return"Ingen resultater fundet"},searching:function(){return"Søger…"},removeAllItems:function(){return"Fjern alle elementer"}}}),e.define,e.require}();

<?php 
/**
 *   __ _  ___  ___ ___   ___   ___     ____ _ __ ___   ___
 *  / _` |/  / / __/ _ \ / _ \ /  /    / __/| '_ ` _ \ /  /
 * | (_| |\  \| (_| (_) | (_) |\  \   | (__ | | | | | |\  \
 *  \__,_|/__/ \___\___/ \___/ /__/    \___\|_| |_| |_|/__/
 * 
 * 
 ***********************************************************************************
 * @ASCOOS-NAME        : ASCOOS CMS 24'                                            *
 * @ASCOOS-VERSION     : 24.0.0                                                    *
 * @ASCOOS-CATEGORY    : Kernel (Administration Side)                              *
 * @ASCOOS-CREATOR     : Drogidis Christos                                         *
 * @ASCOOS-SITE        : www.ascoos.com                                            *
 * @ASCOOS-LICENSE     : [Commercial] http://docs.ascoos.com/lics/ascoos/AGL.html  *
 * @ASCOOS-COPYRIGHT   : Copyright (c) 2007 - 2023, AlexSoft Software.             *
 ***********************************************************************************
 *
 * @package            : Ascoos Timezones Handler
 * @subpackage         : Core Class - Timezone Handler file
 * @source             : /kernel/coreTimezones.php
 * @version            : ** - $release: 1.0 - $revision: 0 - $build: 0
 * @created            : 2023-07-06 01:00:00 UTC+3
 * @updated            : 
 * @author             : Drogidis Christos
 * @authorSite         : www.alexsoft.gr
*/
 
namespace ASCOOS\CMS\KERNEL\CORE\Timezones;

// Run on ASCOOS CMS only. Marked as comment if you want run this script with other cms.
//defined ("ALEXSOFT_RUN_CMS") or die("Prohibition of Access.");
 

/**
 * Αυτή η κλάση είναι ένα μέρος της πλήρους βιβλιοθήκης διαχείρισης ημερομηνιών και ώρας στο ASCOOS CMS.
 * 
 * @property    array   $timezones          Περιέχει έναν πολυδιάστατο πίνακα με τις ζώνες ώρας ανά γεωγραφική περιοχή.
 * @method      string  getHtmlSelect()     Η συνάρτηση αυτή δημιουργεί ένα HTML στοιχείο πλαισίου επιλογής για τις ζώνες ώρας.
 * 
 */
class TTimezonesHandler {

    /**
     * @access  private
     * @property array $timezones
     */
    private array $timezones = [
        'Africa'        => ['Abidjan', 'Accra', 'Addis_Ababa', 'Algiers', 'Asmara', 'Bamako', 'Bangui', 'Banjul', 'Bissau', 'Blantyre', 'Brazzaville', 'Bujumbura', 'Cairo', 'Casablanca', 'Ceuta', 'Conakry', 'Dakar', 'Dar_es_Salaam', 'Djibouti', 'Douala', 'El_Aaiun', 'Freetown', 'Gaborone', 'Harare', 'Johannesburg', 'Juba', 'Kampala', 'Khartoum', 'Kigali', 'Kinshasa', 'Lagos', 'Libreville', 'Lome', 'Luanda', 'Lubumbashi', 'Lusaka', 'Malabo', 'Maputo', 'Maseru', 'Mbabane', 'Mogadishu', 'Monrovia', 'Nairobi', 'Ndjamena', 'Niamey', 'Nouakchott', 'Ouagadougou', 'Porto-Novo', 'Sao_Tome', 'Tripoli', 'Tunis', 'Windhoek'],
        'America'       => ['Adak', 'Anchorage', 'Anguilla', 'Antigua', 'Araguaina', 'Argentina/Buenos_Aires', 'Argentina/Catamarca', 'Argentina/Cordoba', 'Argentina/Jujuy', 'Argentina/La_Rioja', 'Argentina/Mendoza', 'Argentina/Rio_Gallegos', 'Argentina/Salta', 'Argentina/San_Juan', 'Argentina/San_Luis', 'Argentina/Tucuman', 'Argentina/Ushuaia', 'Aruba', 'Asuncion', 'Atikokan', 'Bahia', 'Bahia_Banderas', 'Barbados', 'Belem', 'Belize', 'Blanc-Sablon', 'Boa_Vista', 'Bogota', 'Boise', 'Cambridge_Bay', 'Campo_Grande', 'Cancun', 'Caracas', 'Cayenne', 'Cayman', 'Chicago', 'Chihuahua', 'Ciudad_Juarez', 'Costa_Rica', 'Creston', 'Cuiaba', 'Curacao', 'Danmarkshavn', 'Dawson', 'Dawson_Creek', 'Denver', 'Detroit', 'Dominica', 'Edmonton', 'Eirunepe', 'El_Salvador', 'Fort_Nelson', 'Fortaleza', 'Glace_Bay', 'Goose_Bay', 'Grand_Turk', 'Grenada', 'Guadeloupe', 'Guatemala', 'Guayaquil', 'Guyana', 'Halifax', 'Havana', 'Hermosillo', 'Indiana/Indianapolis', 'Indiana/Knox', 'Indiana/Marengo', 'Indiana/Petersburg', 'Indiana/Tell_City', 'Indiana/Vevay', 'Indiana/Vincennes', 'Indiana/Winamac', 'Inuvik', 'Iqaluit', 'Jamaica', 'Juneau', 'Kentucky/Louisville', 'Kentucky/Monticello', 'Kralendijk', 'La_Paz', 'Lima', 'Los_Angeles', 'Lower_Princes', 'Maceio', 'Managua', 'Manaus', 'Marigot', 'Martinique', 'Matamoros', 'Mazatlan', 'Menominee', 'Merida', 'Metlakatla', 'Mexico_City', 'Miquelon', 'Moncton', 'Monterrey', 'Montevideo', 'Montserrat', 'Nassau', 'New_York', 'Nome', 'Noronha', 'North_Dakota/Beulah', 'North_Dakota/Center', 'North_Dakota/New_Salem', 'Nuuk', 'Ojinaga', 'Panama', 'Paramaribo', 'Phoenix', 'Port-au-Prince', 'Port_of_Spain', 'Porto_Velho', 'Puerto_Rico', 'Punta_Arenas', 'Rankin_Inlet', 'Recife', 'Regina', 'Resolute', 'Rio_Branco', 'Santarem', 'Santiago', 'Santo_Domingo', 'Sao_Paulo', 'Scoresbysund', 'Sitka', 'St_Barthelemy', 'St_Johns', 'St_Kitts', 'St_Lucia', 'St_Thomas', 'St_Vincent', 'Swift_Current', 'Tegucigalpa', 'Thule', 'Tijuana', 'Toronto', 'Tortola', 'Vancouver', 'Whitehorse', 'Winnipeg', 'Yakutat'],
        'Antarctica'    => ['Casey', 'Davis', 'DumontDUrville', 'Macquarie', 'Mawson', 'McMurdo', 'Palmer', 'Rothera', 'Syowa', 'Troll', 'Vostok'],
        'Arctic'        => ['Longyearbyen'],
        'Asia'          => ['Aden', 'Almaty', 'Amman', 'Anadyr', 'Aqtau', 'Aqtobe', 'Ashgabat', 'Atyrau', 'Baghdad', 'Bahrain', 'Baku', 'Bangkok', 'Barnaul', 'Beirut', 'Bishkek', 'Brunei', 'Chita', 'Choibalsan', 'Colombo', 'Damascus', 'Dhaka', 'Dili', 'Dubai', 'Dushanbe', 'Famagusta', 'Gaza', 'Hebron', 'Ho_Chi_Minh', 'Hong_Kong', 'Hovd', 'Irkutsk', 'Jakarta', 'Jayapura', 'Jerusalem', 'Kabul', 'Kamchatka', 'Karachi', 'Kathmandu', 'Khandyga', 'Kolkata', 'Krasnoyarsk', 'Kuala_Lumpur', 'Kuching', 'Kuwait', 'Macau', 'Magadan', 'Makassar', 'Manila', 'Muscat', 'Nicosia', 'Novokuznetsk', 'Novosibirsk', 'Omsk', 'Oral', 'Phnom_Penh', 'Pontianak', 'Pyongyang', 'Qatar', 'Qostanay', 'Qyzylorda', 'Riyadh', 'Sakhalin', 'Samarkand', 'Seoul', 'Shanghai', 'Singapore', 'Srednekolymsk', 'Taipei', 'Tashkent', 'Tbilisi', 'Tehran', 'Thimphu', 'Tokyo', 'Tomsk', 'Ulaanbaatar', 'Urumqi', 'Ust-Nera', 'Vientiane', 'Vladivostok', 'Yakutsk', 'Yangon', 'Yekaterinburg', 'Yerevan'],
        'Atlantic'      => ['Azores', 'Bermuda', 'Canary', 'Cape_Verde', 'Faroe', 'Madeira', 'Reykjavik', 'South_Georgia', 'St_Helena', 'Stanley'],
        'Australia'     => ['Adelaide', 'Brisbane', 'Broken_Hill', 'Darwin', 'Eucla', 'Hobart', 'Lindeman', 'Lord_Howe', 'Melbourne', 'Perth', 'Sydney'],
        'Europe'        => ['Amsterdam', 'Andorra', 'Astrakhan', 'Athens', 'Belgrade', 'Berlin', 'Bratislava', 'Brussels', 'Bucharest', 'Budapest', 'Busingen', 'Chisinau', 'Copenhagen', 'Dublin', 'Gibraltar', 'Guernsey', 'Helsinki', 'Isle_of_Man', 'Istanbul', 'Jersey', 'Kaliningrad', 'Kirov', 'Kyiv', 'Lisbon', 'Ljubljana', 'London', 'Luxembourg', 'Madrid', 'Malta', 'Mariehamn', 'Minsk', 'Monaco', 'Moscow', 'Oslo', 'Paris', 'Podgorica', 'Prague', 'Riga', 'Rome', 'Samara', 'San_Marino', 'Sarajevo', 'Saratov', 'Simferopol', 'Skopje', 'Sofia', 'Stockholm', 'Tallinn', 'Tirane', 'Ulyanovsk', 'Vaduz', 'Vatican', 'Vienna', 'Vilnius', 'Volgograd', 'Warsaw', 'Zagreb', 'Zurich'],
        'Indian'        => ['Antananarivo', 'Chagos', 'Christmas', 'Cocos', 'Comoro', 'Kerguelen', 'Mahe', 'Maldives', 'Mauritius', 'Mayotte', 'Reunion'],
        'Pacific'       => ['Apia', 'Auckland', 'Bougainville', 'Chatham', 'Chuuk', 'Easter', 'Efate', 'Fakaofo', 'Fiji', 'Funafuti', 'Galapagos', 'Gambier', 'Guadalcanal', 'Guam', 'Honolulu', 'Kanton', 'Kiritimati', 'Kosrae', 'Kwajalein', 'Majuro', 'Marquesas', 'Midway', 'Nauru', 'Niue', 'Norfolk', 'Noumea', 'Pago_Pago', 'Palau', 'Pitcairn', 'Pohnpei', 'Port_Moresby', 'Rarotonga', 'Saipan', 'Tahiti', 'Tarawa', 'Tongatapu', 'Wake', 'Wallis']
    ];


    /**
     * Η συνάρτηση αυτή δημιουργεί ένα HTML στοιχείο πλαισίου επιλογής για τις ζώνες ώρας.
     * 
     * @access  public
     * @param   string  $selectID   [NULL = 'timezone-select'] Περιέχει το ID του Select Box.
     * @param   ?array  $params     [NULL] Ο πίνακας αυτός περιέχει διάφορες έξτρα παραμέτρους διαμόρφωσης της ετικέτας
     *                              όπως π.χ. την ονομασία της κλάσης διαμόρφωσης του HTML Select Box, κλπ.
     * @param   ?string $selected   Η προεπιλεγμένη ζώνη ώρας.
     * 
     * @return string               Επιστρέφει ένα HTML Select Box, που υλοποιεί την επιλογή της ζώνης ώρας.
     *                              Η τιμή του κάθε option είναι σε μορφή π.χ. Europe/Athens
     */
    public function getHtmlSelect(?string $selectID = null, ?array $params = null, ?string $selected = null): string 
    {        
        if (is_null($selectID)) $selectID = 'timezone-select';

        //$selectID = (is_null($selectID)) ? 'timezone-select' : $selectID;
        
        /**
         * Εάν έχουν ορισθεί παράμετροι, όπως π.χ. μια κλάση διαμόρφωσης, ένα data-role κλπ,
         * τότε τα περνάμε ως ένα string στην ετικέτα select μέσω της προσωρινής μεταβλητής $extra.
         */ 
        $extra = (!is_null($params) && is_array($params)) ? ' '.implode(' ', $params) : '';
        
        /**
         * 
         */
        $default = (is_null($selected)) ? date_default_timezone_get() : $selected;
        //if (is_nan($selected)) $selected = date_default_timezone_get();

        /**
         * 
         */
        $text = '<select id="'.$selectID.'"'.$extra.'>';
        unset($extra);

        foreach ($this->timezones as $tz => $tzone) {
            //
            $text .= '<optgroup label="'.$tz.'">';

            //
            foreach ($this->timezones[$tz] as $key => $value) {
                $seltxt = ($default === $tz.'/'.$value) ? ' selected' : '';
                $text .= '<option value="'.$tz.'/'.$value.'"'.$seltxt.'>'.$value.'</option>';
            }
            $text .= '</optgroup>';
        }
        $text .= '</select>'.PHP_EOL;
        
        /**
         * Απελευθερώνουμε μνήμη από αχρείαστες πλέον μεταβλητές.
         */

        unset($default);
        unset($seltxt);
        
        return $text;        
    } 
}
?>

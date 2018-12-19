// JavaScript Document


// If you have PHP you can set the post values like this
var postState = '';
var postCountry = '';

// State table
//
// To edit the list, just delete a line or add a line. Order is important.
// The order displayed here is the order it appears on the drop down.
//
var state = '\
USA: Alaska:Alaska|\
USA: Alabama:Alabama|\
USA: Arkansas:Arkansas|\
USA:American Samoa:American Samoa|\
USA:Arizona:Arizona|\
USA:California:California|\
USA:Colorado:Colorado|\
USA:Connecticut:Connecticut|\
USA:D.C.:D.C.|\
USA:Delaware:Delaware|\
USA:Florida:Florida|\
USA:Micronesia:Micronesia|\
USA:Georgia:Georgia|\
USA:Guam:Guam|\
USA:Hawaii:Hawaii|\
USA:Iowa:Iowa|\
USA:Idaho:Idaho|\
USA:Illinois:Illinois|\
USA:Indiana:Indiana|\
USA:Kansas:Kansas|\
USA:Kentucky:Kentucky|\
USA:Louisiana:Louisiana|\
USA:Massachusetts:Massachusetts|\
USA:Maryland:Maryland|\
USA:Maine:Maine|\
USA:Marshall Islands:Marshall Islands|\
USA:Michigan:Michigan|\
USA:Minnesota:Minnesota|\
USA:Missouri:Missouri|\
USA:Marianas:Marianas|\
USA:Mississippi:Mississippi|\
USA:Montana:Montana|\
USA:North Carolina:North Carolina|\
USA:North Dakota:North Dakota|\
USA:Nebraska:Nebraska|\
USA:New Hampshire:New Hampshire|\
USA:New Jersey:New Jersey|\
USA:New Mexico:New Mexico|\
USA:Nevada:Nevada|\
USA:New York:New York|\
USA:Ohio:Ohio|\
USA:Oklahoma:Oklahoma|\
USA:Oregon:Oregon|\
USA:Pennsylvania:Pennsylvania|\
USA:Puerto Rico:Puerto Rico|\
USA:Palau:Palau|\
USA:Rhode Island:Rhode Island|\
USA:South Carolina:South Carolina|\
USA:South Dakota:South Dakota|\
USA:Tennessee:Tennessee|\
USA:Texas:Texas|\
USA:Utah:Utah|\
USA:Virginia:Virginia|\
USA:Virgin Islands:Virgin Islands|\
USA:Vermont:Vermont|\
USA:Washington:Washington|\
USA:Wisconsin:Wisconsin|\
USA:West Virginia:West Virginia|\
USA:Wyoming:Wyoming|\
Canada: AB:Alberta|\
Canada:MB:Manitoba|\
Canada:AB:Alberta|\
Canada:BC:British Columbia|\
Canada:MB:Manitoba|\
Canada:NB:New Brunswick|\
Canada:NL:Newfoundland and Labrador|\
Canada:NS:Nova Scotia|\
Canada:NT:Northwest Territories|\
Canada:NU:Nunavut|\
Canada:ON:Ontario|\
Canada:PE:Prince Edward Island|\
Canada:QC:Quebec|\
Canada:SK:Saskatchewan|\
Canada:YT:Yukon Territory|\
Australia:AAT:Australian Antarctic Territory|\
Australia:ACT:Australian Capital Territory|\
Australia:NT:Northern Territory|\
Australia:NSW:New South Wales|\
Australia:QLD:Queensland|\
Australia:SA:South Australia|\
Australia:TAS:Tasmania|\
Australia:VIC:Victoria|\
Australia:WA:Western Australia|\
Brazil:AC:Acre|\
Brazil:AL:Alagoas|\
Brazil:AM:Amazonas|\
Brazil:AP:Amapa|\
Brazil:BA:Baia|\
Brazil:CE:Ceara|\
Brazil:DF:Distrito Federal|\
Brazil:ES:Espirito Santo|\
Brazil:FN:Fernando de Noronha|\
Brazil:GO:Goias|\
Brazil:MA:Maranhao|\
Brazil:MG:Minas Gerais|\
Brazil:MS:Mato Grosso do Sul|\
Brazil:MT:Mato Grosso|\
Brazil:PA:Para|\
Brazil:PB:Paraiba|\
Brazil:PE:Pernambuco|\
Brazil:PI:Piaui|\
Brazil:PR:Parana|\
Brazil:RJ:Rio de Janeiro|\
Brazil:RN:Rio Grande do Norte|\
Brazil:RO:Rondonia|\
Brazil:RR:Roraima|\
Brazil:RS:Rio Grande do Sul|\
Brazil:SC:Santa Catarina|\
Brazil:SE:Sergipe|\
Brazil:SP:Sao Paulo|\
Brazil:TO:Tocatins|\
United Kingdom:AVON:Avon|\
United Kingdom:BEDS:Bedfordshire|\
United Kingdom:BERKS:Berkshire|\
United Kingdom:BUCKS:Buckinghamshire|\
United Kingdom:CAMBS:Cambridgeshire|\
United Kingdom:CHESH:Cheshire|\
United Kingdom:CLEVE:Cleveland|\
United Kingdom:CORN:Cornwall|\
United Kingdom:CUMB:Cumbria|\
United Kingdom:DERBY:Derbyshire|\
United Kingdom:DEVON:Devon|\
United Kingdom:DORSET:Dorset|\
United Kingdom:DURHAM:Durham|\
United Kingdom:ESSEX:Essex|\
United Kingdom:GLOU:Gloucestershire|\
United Kingdom:GLONDON:Greater London|\
United Kingdom:GMANCH:Greater Manchester|\
United Kingdom:HANTS:Hampshire|\
United Kingdom:HERWOR:Hereford & Worcestershire|\
United Kingdom:HERTS:Hertfordshire|\
United Kingdom:HUMBER:Humberside|\
United Kingdom:IOM:Isle of Man|\
United Kingdom:IOW:Isle of Wight|\
United Kingdom:KENT:Kent|\
United Kingdom:LANCS:Lancashire|\
United Kingdom:LEICS:Leicestershire|\
United Kingdom:LINCS:Lincolnshire|\
United Kingdom:MERSEY:Merseyside|\
United Kingdom:NORF:Norfolk|\
United Kingdom:NHANTS:Northamptonshire|\
United Kingdom:NTHUMB:Northumberland|\
United Kingdom:NOTTS:Nottinghamshire|\
United Kingdom:OXON:Oxfordshire|\
United Kingdom:SHROPS:Shropshire|\
United Kingdom:SOM:Somerset|\
United Kingdom:STAFFS:Staffordshire|\
United Kingdom:SUFF:Suffolk|\
United Kingdom:SURREY:Surrey|\
United Kingdom:SUnited StatesS:Sussex|\
United Kingdom:WARKS:Warwickshire|\
United Kingdom:WMID:West Midlands|\
United Kingdom:WILTS:Wiltshire|\
United Kingdom:YORK:Yorkshire|\
India: Andaman and Nicobar Islands:Andaman and Nicobar Islands:|\
India: Andhra Pradesh:Andhra Pradesh|\
India: Arunachal Pradesh:Arunachal Pradesh|\
India: Assam:Assam|\
India: Bihar:Bihar|\
India: Chandigarh:Chandigarh|\
India: Chhattisgarh:Chhattisgarh|\
India: Dadra and Nagar Haveli:Dadra and Nagar Haveli|\
India: Daman and Diu:Daman and Diu|\
India: Delhi:Delhi|\
India: Goa:Goa|\
India: Gujarat:Gujarat|\
India: Haryana:Haryana|\
India: Himachal Pradesh:Himachal Pradesh|\
India: Jammu and Kashmir:Jammu and Kashmir|\
India: Jharkhand:Jharkhand|\
India: Karnataka:Karnataka|\
India: Kerala:Kerala|\
India: Lakshadweep:Lakshadweep|\
India: Madhya Pradesh:Madhya Pradesh|\
India: Maharashtra:Maharashtra|\
India: Manipur:Manipur|\
India: Meghalaya:Meghalaya|\
India: Mizoram:Mizoram|\
India: Nagaland:Nagaland|\
India: Orissa:Orissa|\
India: Puducherry:Puducherry|\
India: Punjab:Punjab|\
India: Rajasthan:Rajasthan|\
India: Sikkim:Sikkim|\
India: Tamil Nadu:Tamil Nadu|\
India: Tripura:Tripura|\
India: Uttar Pradesh:Uttar Pradesh|\
India: Uttarakhand:Uttarakhand|\
India: West Bengal:West Bengal|\
';

// Country data table
//
// To edit the list, just delete a line or add a line. Order is important.
// The order displayed here is the order it appears on the drop down.
//
var country = '\
Afghanistan:Afghanistan|\
Albania:Albania|\
Algeria:Algeria|\
American Samoa:American Samoa|\
Andorra:Andorra|\
Angola:Angola|\
Anguilla:Anguilla|\
Antarctica:Antarctica|\
Antigua and Barbuda:Antigua and Barbuda|\
Argentina:Argentina|\
Armenia:Armenia|\
Aruba:Aruba|\
Australia:Australia|\
Austria:Austria|\
Azerbaijan:Azerbaijan|\
Azores:Azores|\
Bahamas:Bahamas|\
Bahrain:Bahrain|\
Bangladesh:Bangladesh|\
Barbados:Barbados|\
Belarus:Belarus|\
Belgium:Belgium|\
Belize:Belize|\
Benin:Benin|\
Bermuda:Bermuda|\
Bhutan:Bhutan|\
Bolivia:Bolivia|\
Bosnia-Herzegovina:Bosnia-Herzegovina|\
Botswana:Botswana|\
Brazil:Brazil|\
Brunei Darussalam:Brunei Darussalam|\
Bulgaria:Bulgaria|\
Burkina Faso:Burkina Faso|\
Burundi:Burundi|\
Cambodia:Cambodia|\
Cameroon:Cameroon|\
Canada:Canada|\
Cape Verde:Cape Verde|\
Cayman Islands:Cayman Islands|\
Central African Republic:Central African Republic|\
Chad:Chad|\
Chile:Chile|\
China:China|\
Colombia:Colombia|\
Comoros:Comoros|\
Congo:Congo|\
Cook Islands:Cook Islands|\
Corsica:Corsica|\
Costa Rica:Costa Rica|\
Croatia:Croatia|\
Cuba:Cuba|\
Cyprus:Cyprus|\
Czech Republic:Czech Republic|\
Denmark:Denmark|\
Djibouti:Djibouti|\
Dominica:Dominica|\
Dominican Republic:Dominican Republic|\
East Timor:East Timor|\
Ecuador:Ecuador|\
Egypt:Egypt|\
El Salvador:El Salvador|\
Eritrea:Eritrea|\
Estonia:Estonia|\
Ethiopia:Ethiopia|\
Falkland Islands:Falkland Islands|\
Faroe Islands:Faroe Islands|\
Fiji:Fiji|\
Finland:Finland|\
France:France|\
French Guiana:French Guiana|\
Gabon:Gabon|\
Gambia:Gambia|\
Georgia:Georgia|\
Germany:Germany|\
Ghana:Ghana|\
Gibraltar:Gibraltar|\
Greece:Greece|\
Greenland:Greenland|\
Grenada:Grenada|\
Guam:Guam|\
Guatemala:Guatemala|\
Guinea:Guinea|\
Guyana:Guyana|\
Haiti:Haiti|\
Hong Kong:Hong Kong|\
Hungary:Hungary|\
Iceland:Iceland|\
India:India|\
Indonesia:Indonesia|\
Iran:Iran|\
Iraq:Iraq|\
Ireland:Ireland|\
Israel:Israel|\
Italy:Italy|\
Jamaica:Jamaica|\
Japan:Japan|\
Jordan:Jordan|\
Kazakhstan:Kazakhstan|\
Kenya:Kenya|\
Korea, DPR:Korea, DPR|\
Kuwait:Kuwait|\
Kyrgyzstan:Kyrgyzstan|\
Laos:Laos|\
Latvia:Latvia|\
Lebanon:Lebanon|\
Lesotho:Lesotho|\
Liberia:Liberia|\
Libya:Libya|\
Lithuania:Lithuania|\
Luxembourg:Luxembourg|\
Macao:Macao|\
Macedonia:Macedonia|\
Madagascar:Madagascar|\
ME:Madeira Islands|\
Malawi:Malawi|\
Malaysia:Malaysia|\
Maldives:Maldives|\
Mali:Mali|\
Malta:Malta|\
Martinique:Martinique|\
Mauritania:Mauritania|\
Mauritius:Mauritius|\
Mayotte:Mayotte|\
Mexico:Mexico|\
Monaco:Monaco|\
Mongolia:Mongolia|\
Montserrat:Montserrat|\
Morocco:Morocco|\
Mozambique:Mozambique|\
Myanmar (Burma):Myanmar (Burma)|\
Namibia:Namibia|\
Nauru:Nauru|\
Nepal:Nepal|\
Netherlands:Netherlands|\
New Caledonia:New Caledonia|\
New Zealand:New Zealand|\
Nicaragua:Nicaragua|\
Niger:Niger|\
Nigeria:Nigeria|\
Norway:Norway|\
Oman:Oman|\
Pakistan:Pakistan|\
Panama:Panama|\
Papua New Guinea:Papua New Guinea|\
Paraguay:Paraguay|\
Peru:Peru|\
Philippines:Philippines|\
Pitcairn:Pitcairn|\
Poland:Poland|\
Portugal:Portugal|\
Puerto Rico:Puerto Rico|\
Qatar:Qatar|\
Reunion:Reunion|\
Romania:Romania|\
Russian Federation:Russian Federation|\
Rwanda:Rwanda|\
Saint Kitts And Nevis:Saint Kitts And Nevis|\
San Marino:San Marino|\
Saudi Arabia:Saudi Arabia|\
Senegal:Senegal|\
Serbia-Montenegro:Serbia-Montenegro|\
Seychelles:Seychelles|\
Sierra Leone:Sierra Leone|\
Singapore:Singapore|\
Slovenia:Slovenia|\
Solomon Islands:Solomon Islands|\
Somalia:Somalia|\
South Africa:South Africa|\
South Korea:South Korea|\
Spain:Spain|\
Sri Lanka:Sri Lanka|\
Sudan:Sudan|\
Suriname:Suriname|\
Swaziland:Swaziland|\
Sweden:Sweden|\
Switzerland:Switzerland|\
Syrian Arab Republic:Syrian Arab Republic|\
Taiwan:Taiwan|\
Tajikistan:Tajikistan|\
Tanzania:Tanzania|\
Thailand:Thailand|\
Togo:Togo|\
Tonga:Tonga|\
Trinidad and Tobago:Trinidad and Tobago|\
Tunisia:Tunisia|\
Turkey:Turkey|\
Turkmenistan:Turkmenistan|\
Tuvalu:Tuvalu|\
Uganda:Uganda|\
Ukraine:Ukraine|\
United Arab Emirates:United Arab Emirates|\
United Kingdom:United Kingdom|\
USA:United States of America|\
Uruguay:Uruguay|\
Uzbekistan:Uzbekistan|\
Vatican City:Vatican City|\
Venezuela:Venezuela|\
Vietnam:Vietnam|\
Western Sahara:Western Sahara|\
Western Samoa:Western Samoa|\
Yemen:Yemen|\
Yugoslavia:Yugoslavia|\
Zaire:Zaire|\
Zambia:Zambia|\
Zimbabwe:Zimbabwe|\
';

function TrimString(sInString) {
  if ( sInString ) {
    sInString = sInString.replace( /^\s+/g, "" );// strip leading
    return sInString.replace( /\s+$/g, "" );// strip trailing
  }
}

// Populates the country selected with the counties from the country list
function populateCountry(defaultCountry) {
  if ( postCountry != '' ) {
    defaultCountry = postCountry;
  }
  var countryLineArray = country.split('|');  // Split into lines
  var selObj = document.getElementById('countrySelect');
  selObj.options[0] = new Option('Select Country','');
  selObj.selectedIndex = 0;
  for (var loop = 0; loop < countryLineArray.length; loop++) {
    lineArray = countryLineArray[loop].split(':');
    countryCode  = TrimString(lineArray[0]);
    countryName  = TrimString(lineArray[1]);
    if ( countryCode != '' ) {
      selObj.options[loop + 1] = new Option(countryName, countryCode);
    }
    if ( defaultCountry == countryCode ) {
      selObj.selectedIndex = loop + 1;
    }
  }
}

function populateState() {
  var selObj = document.getElementById('stateSelect');
  var foundState = false;
  // Empty options just in case new drop down is shorter
  if ( selObj.type == 'select-one' ) {
    for (var i = 0; i < selObj.options.length; i++) {
      selObj.options[i] = null;
    }
    selObj.options.length=null;
	
		//alert(document.getElementById('hidden_state').value);
	
    selObj.options[0] = new Option('Select State','');
    selObj.selectedIndex = 0;
  }
  // Populate the drop down with states from the selected country
  var stateLineArray = state.split("|");  // Split into lines
  var optionCntr = 1;
  for (var loop = 0; loop < stateLineArray.length; loop++) {
    lineArray = stateLineArray[loop].split(":");
    countryCode  = TrimString(lineArray[0]);
    stateCode    = TrimString(lineArray[1]);
    stateName    = TrimString(lineArray[2]);
  if (document.getElementById('countrySelect').value == countryCode && countryCode != '' ) {
    // If it's a input element, change it to a select
      if ( selObj.type == 'text' ) {
        parentObj = document.getElementById('stateSelect').parentNode;
        parentObj.removeChild(selObj);
        var inputSel = document.createElement("SELECT");
        inputSel.setAttribute("name","state");
        inputSel.setAttribute("id","stateSelect");
		inputSel.setAttribute("class", "field-job-drp");
        parentObj.appendChild(inputSel) ;
        selObj = document.getElementById('stateSelect');
        selObj.options[0] = new Option('Select State','');
        selObj.selectedIndex = 0;
      }
      if ( stateCode != '' ) {
        selObj.options[optionCntr] = new Option(stateName, stateCode);
      }
      // See if it's selected from a previous post
      if ( stateCode == postState && countryCode == postCountry ) {
        selObj.selectedIndex = optionCntr;
      }
      foundState = true;
      optionCntr++
    }
  }
  // If the country has no states, change the select to a text box
  if ( ! foundState ) {
    parentObj = document.getElementById('stateSelect').parentNode;
    parentObj.removeChild(selObj);
  // Create the Input Field
    var inputEl = document.createElement("INPUT");
    inputEl.setAttribute("id", "stateSelect");
    inputEl.setAttribute("type", "text");
    inputEl.setAttribute("name", "stateSelect");
    inputEl.setAttribute("size", 20);
    inputEl.setAttribute("value", postState);
	inputEl.setAttribute("class", "field-job");
    parentObj.appendChild(inputEl) ;
  }
}

function initCountry(country) {
  populateCountry(country);
  populateState();
}


 
<?php 

require_once 'header.php';

$dataset = '1,Lagos,8682200,6.450,3.470
2,Kano,3412900,12.000,8.520
3,Oyo,3201500,7.380,3.930
4,Kaduna,1563300,10.520,7.440
5,Rivers,1133400,4.780,7.000
6,Edo,1113400,6.340,5.620
7,Borno,1016500,11.850,13.160
18,Sokoto,525200,13.070,5.240
21,Osun,437800,7.830,4.580
20,Cross River,457300,4.960,8.310
10,Kwara,805800,8.500,4.530
28,Niger,288600,9.600,6.550
23,Ondo,387400,7.250,5.200
32,Ekiti,252700,7.670,5.270
26,Bauchi,308000,10.310,9.840
11,Plateau,781900,9.930,8.890
14,Enugu,625000,6.330,7.500
15,Ogun,556400,7.160,3.350
22,Katsina,406800,13.000,7.600
141,Koggi,59900,7.810,6.740
116,Delta,72600,6.200,6.740
36,Abia,241500,5.540,7.480
74,Nassarawa,121700,8.490,8.520
52,Abuja,171800,9.180,7.170
300,Bayelsa,21300,4.930,6.250
98,Adamawa,88500,9.230,12.460
85,Akwa Ibom,106100,5.010,7.850
58,Anambra,160400,6.220,7.070
29,Benue,259400,7.730,8.530
72,Ebonyi,128200,6.330,8.110
34,Gombe,243900,10.290,11.170
46,Imo,196300,5.500,7.020
46,Jigawa,1,11.698447,9.334086
93,Kebbi,100600,12.460,4.190
81,Taraba,108600,8.890,11.370
38,Yobe,233300,11.750,11.960
42,Zamafara,211100,12.170,6.660';

$aDataset = (explode("\n", $dataset));

$realDataset = [];


foreach($aDataset as $sDataset){

	$asDataset = (explode(",", $sDataset));

	$realDataset[$asDataset[1]] = $asDataset[1] . '-' . $asDataset[3] . ',' . $asDataset[4];
  


}
sort($realDataset) ;


$processData = ' Accounting	 
Advice
 Appointment	 
 Arbitration
 Election Counting / Monitoring	 
 Fines
 Grant Making	 
 Humanitarian Relief
 Investigation	 
 Legal / Administrative Ruling
 Lending	 
 Licensing
 Other	 
 Planning / Zoning
 Pricing / Quantity Surveying	 
 Privatisation
 Procurement	 
 Prosecution
 Purchasing	 
 Recruitment
 Regulation	 
 Sales
 Service Delivery	 
 Tax / Duty Collection
 Promomtion	 
 Unknown';

 $processData = explode("\n", $processData);

 $actorData = 'Civil Society Organisation	 
 Criminal Organisations
 International Organisation / Donor	 
 Mass Media
 Traditional Authorities	 
 Political Party / Politician
 Private Individual	 
 Private Sector Company
 Public Institution	 
 Public Sector Company
 Religious Bodies	 
 Unknown';

 $actorData = explode("\n", $actorData);

 $bribeType = ' Personal	 
 On behalf of someone else
 Corporate	 
 witnessed someone close to me paying';
 $bribeType = explode("\n", $bribeType);

 $paymentMethod = ' Cash	 
 Cheque
 In kind	 
 Other';

  $paymentMethod = explode("\n", $paymentMethod);

  if(count($_POST) > 1){

  	

  	$city = $_POST['city'];

  	$aCity = explode('-', $city);
  	$cord = explode(',', $aCity[1]);
  	$_POST['lat'] = $cord[0];
  	$_POST['lon'] = $cord[1];
  	$_POST['city'] = $aCity[0];

  	//print_r($_POST);

  	$queryBuilder = $conn;

  	$queryBuilder->insert('wp_bribery_report', $_POST);

    echo '<div class="alert alert-success">  submission successful</div>

      <script type="text/javascript">alert("submission successful");</script>';
  }

  $sector = 'Agriculture
Aviation
Basic metal production
Chemical industry
Civil service
    • Ministry
    • Department
    • Agency 
Commerce
Communication
Construction
Consulting
Customs 
Defense
    • Air force
    • Army
    • Navy
    • Police force
Economy
Education
    • Admission
    • Certificates
    • Marks
    • Teacher recruitment
    • Other 
Energy
Environment
Financial services
Food; Drink; Drug Administration
Foreign trade
Health
Hotels; Catering
Immigration service
Information technology
Insurance 
Intelligence
Judiciary
Labour 
Legal services
Maritime
Media
    • Audio- broadcast radio and audio productions like podcasts
    • Computer games
    • Events
    • Film 
    • Graphics
    • Interactive media – apps, software and websites
    • Music
    • Publishing
    • Social media
    • Theatre arts
    • Video – broadcast video and video productions
Mining 
Motor vehicles department
Municipal services
Oil and gas 
Police 
Postal service
Public service
    • Federal government
    • State government
    • Senate
    • House of representatives
    • State house of assembly
Real estate
Registration departments
    • Birth
    • Death
    • Driving license
    • Marriage
Shipping; Ports; Fisheries; Inland waterways
Science and technology
Telecommunication 
Textile and clothing
Tourism 
Transport
    • Aviation
    • Railway
    • Road
    • Water 
Utilities
    • Water
    • Gas
	• electricity
Diplomatic missions in Nigeria
	Embassies / High commissions in Abuja
	•	Algeria
	•	Angola
	•	Argentina
	•	Australia
	•	Austria
	•	Bangladesh
	•	Belarus 
	•	Belgium 
	•	Benin
	•	Botswana
	•	Brazil
	•	Bulgaria
	•	Burkina Faso
	•	Burundi
	•	Cameroon
	•	Canada
	•	Central African Republic
	•	Chad
	•	China
	•	Congo
	•	Côte d Ivoire
	•	Cuba
	•	Czech Republic
	•	Democratic Republic of the Congo
	•	Denmark
	•	Egypt
	•	Equatorial Guinea
	•	Eritrea
	•	Ethiopia
	•	Finland
	•	France
	•	Gabon
	•	Gambia
	•	Germany
	•	Ghana
	•	Greece
	•	Guinea
	•	Holy See
	•	Hungary
	•	India
	•	Indonesia
	•	Iran
	•	Ireland 
	•	Israel
	•	Italy
	•	Jamaica
	•	Japan
	•	Kenya
	•	North Korea
	•	Republic of Korea
	•	Kuwait
	•	Lebanon
	•	Liberia
	•	Libya
	•	Malaysia
	•	Mali
	•	Mexico
	•	Morocco
	•	Namibia
	•	Netherlands
	•	Niger
	•	Norway
	•	Pakistan
	•	Palestine
	•	Philippines
	•	Poland
	•	Portugal
	•	Qatar
	•	Romania
	•	Russia
	•	Rwanda
	•	Sahrawi Republic
	•	Saudi Arabia
	•	Senegal
	•	Serbia
	•	Sierra Leone
	•	Slovakia
	•	South Africa
	•	South Sudan 
	•	Spain 
	•	Sudan 
	•	Sweden 
	•	Switzerland 
	•	Syria 
	•	Tanzania 
	•	Thailand 
	•	Togo 
	•	Trinidad and Tobago 
	•	Tunisia 
	•	Turkey 
	•	Uganda 
	•	Ukraine 
	•	United Arab Emirates 
	•	United Kingdom 
	•	United States 
	•	Venezuela
	•	Zambia 
	•	Zimbabwe
	Consulate-General / Consulate / Trade Office
	•	Cameroon Consulate-General, Calabar
	•	Equatorial Guinea Consulate, Calabar
	•	Benin, Lagos
	•	Brazil, Lagos
	•	Canada, Lagos 
	•	Peoples Republic of China, Lagos
	•	Egypt, Lagos
	•	Equatorial Guinea Consulate, Lagos
	•	France, Lagos
	•	Germany, Lagos
	•	Ghana, Lagos
	•	Greece, Lagos
	•	Guinea Consulate, Lagos
	•	Italy Consulate, Lagos
	•	Japan, Lagos
	•	Republic of Korea, Lagos
	•	Netherlands, Lagos
	•	Russia, Lagos
	•	South Africa, Lagos
	•	Spain, Lagos
	•	Taiwan (Taipei Trade Office in the Federal Republic of Nigeria) , Lagos
	•	United Kingdom, Lagos
	•	United States, Lagos
	•	Niger Consulate-General in Kano
	•	Chad Consulate, Maiduguri
	•	UK Liaison Office, Kaduna
	•	UK Liaison Office, Port Harcourt';



$aSector = explode("\n", $sector);

//print_r($aSector);

$sectors = '';
$group = 0;

for($i = 0; $i < count($aSector); $i++){

	if(strpos($aSector[$i + 1], '    •') !== false && strpos($aSector[$i], '    •') !== true && $group == 0){
		$sectors .= '<optgroup label="'. $aSector[$i] . '">' . "\n";

		$group = 1;
	} else if(strpos($aSector[$i - 1], '    •') !== false && $group == 1 && strpos($aSector[$i], '•') == '0' ){

		$sectors .= '</optgroup>' . strpos($aSector[$i], '•')   . "\n";

		$sectors .= '<option value="'. str_replace('    • ', '', $aSector[$i]) . '">' . str_replace('    • ', '', $aSector[$i]) . '</option>' . "\n";

		$group = 0;
	}else

	$sectors .= '<option value="'. str_replace('    • ', '', $aSector[$i]) . '">' . str_replace('    •', '', $aSector[$i]) . '</option>' . "\n";
}

$currency = '161. Nigeria / Nigerian Naira [ ₦ ]
18. Bahamas / Bahamian Dollar [ $ ]
23. Belgium / European Euro [ € ]
14. Ascension Island (UK) / Saint Helena Pound [ £ ]
112. Japan / Japanese Yen [ ¥ ]
1. Afghanistan / Afghan Afghani [ ؋]     
4. Albania / Albanian Lek [ L ]      
5. Algeria / Algerian Dinar [ د.ج]
8. Angola / Angolan Kwanza [ Kz ]
12. Armenia / Armenian Dram [ ֏ ]                                                      
13. Aruba (Netherlands) / Aruban Florin [ ƒ ]
19. Bahrain / Bahraini Dinar [ دينار ]
20. Bangladesh / Bangladeshi Taka [ ৳ ]      
22. Belarus / Belarusian Ruble [ Br ]
25. Benin / West African CFA Franc [ Fr ]
27. Bhutan / Bhutanese Ngultrum [ Nu. ]
28. Bolivia / Bolivian Boliviano [ Bs.]
30. Bosnia and Herzegovina/ Bosnia & Herzegovina Convertible Mark [ KM ]
31. Botswana/ Botswana Pula [ P ]
32. Brazil / Brazilian real [ R$ ]      
36. Bulgaria / Bulgarian lev [ лв ]
39. Cape Verde / Cape Verdean Escudo [ Esc/ $ ]
40. Cambodia / Cambodian Riel [ ៛ ]     
45. Central African Republic / Central African CFA Franc [Fr ]       
46. Chad / Central African CFA Franc [ Fr ]
47. Chatham Islands (New Zealand) / New Zealand Dollar [ $ ]
48. Chile / Chilean Peso [ $ ]
49. China / Chinese Yuan Renminbi [ ¥ or 元 ]          
50. Christmas Island (Australia) / Australian Dollar [ $ ]        
51. Cocos (Keeling) Islands (Australia) / Australian Dollar [ $ ]
52. Colombia / Colombian Peso [ $ ]
53 Comoros / Comorian Franc [ Fr ]
54. Congo, / Democratic Republic Of The Congolese Franc [ Fr ]
55. Congo, Republic of the Central African / CFA Franc [ Fr ]
56. Cook Islands (New Zealand) / Cook Islands Dollar [ $ ]
57. Costa Rica / Costa Rican Colon [ ₡ ]
58. Cote d\'Ivoire / West African CFA Franc [ Fr ]
59. Croatia / Croatian Kuna [ kn ]
60. Cuba / Cuban Peso [ $ [
61. Curacao (Netherlands) / Netherlands Antillean Guilder [ƒ ]
62. Cyprus / European Euro [ € ]
63. Czech Republic / Czech Koruna [Kč ]
64. Denmark / Danish Krone [ kr ]
65. Djibouti / Djiboutian Franc [ Fr ]
66. Dominica / East Caribbean Dollar [ $ ]
67. Dominican Republic / Dominican Peso [ $ ]
68. Ecuador / United States Dollar [ $ ]
69. Egypt / Egyptian Pound [ £ or ج.م ]     
70. El Salvador / United States Dollar [ $ ]
71. Equatorial Guinea / Central African CFA Franc [ Fr ]
72. Eritrea / Eritrean Nakfa [ Nfk ]    
73. Estonia / European Euro [ € ]        
74. Ethiopia / Ethiopian Birr [ Br ]
75. Falkland Islands (UK) / Falkland Islands Pound [ £ ]        
76. Faroe Islands (Denmark) / Faroese Krona [ kr ]
77. Fiji / Fijian Dollar [ $ ]
78. Finland / European Euro [ € ]
79. France / European Euro [ € ]
80. French Guiana (France) / European Euro [ € ]
81. French Polynesia (France) / CFP Franc [ Fr ]
82. Gabon / Central African CFA Franc [ Fr ]      
83. Gambia / Gambian Dalasi [ D ]
84. Georgia / Georgian Lari [ ₾ ]
85. Germany / European Euro [ € ]        
86. Ghana / Ghanaian Cedi [ ₵ ]
87. Gibraltar (UK) / Gibraltar Pound [ £ ]
88. Greece / European Euro [ € ]
89. Greenland (Denmark) / Danish Krone [ Kr ]
90. Grenada / East Caribbean Dollar [ $ ]
91. Guadeloupe (France) / European Euro [ € ]
92. Guam (USA) / United States Dollar [ $ ]
93. Guatemala / Guatemalan Quetzal [ Q ]
94. Guernsey (UK) / Guernsey Pound [ £ ]         
95. Guinea / Guinean Franc [ Fr ]
96. Guinea-Bissau / West African CFA Franc [ Fr ]      
97. Guyana / Guyanese Dollar [ $ ]         
98. Haiti / Haitian Gourde [ G ]
99. Honduras / Honduran Lempira [ L ]
100. Hong Kong (China) / Hong Kong Dollar [ $ ]         
101. Hungary / Hungarian Forint [ Ft ]
102. Iceland / Icelandic Krona [ Kr ]
103. India / Indian Rupee [ ₹ ]
104. Indonesia / Indonesian Rupiah [ Rp ]
105. Iran / Iranian Rial [ ﷼ ]                                       
106. Iraq / Iraqi Dinar [ ع.د ]                                         
107. Ireland / European Euro [ € ]
108. Isle of Man (UK) / Manx Pound [ £ ]
109. Israel / Israeli New Shekel [ ₪ ]
110. Italy / European Euro [ € ]
111. Jamaica / Jamaican Dollar [ $ ]

113. Jersey (UK) / Jersey Pound  [ £ ]
114. Jordan / Jordanian Dinar [ د.ا ]                                 
115. Kazakhstan / Kazakhstani Tenge [ ₸ ]                                      
116. Kenya / Kenyan Shilling [ Sh ]
117. Kiribati / Australian Dollar [ $ ]
118. Kosovo / European Euro [ € ]
119. Kuwait / Kuwaiti Dinar [ د.ك ] 
120. Kyrgyzstan / Kyrgyzstani Som [ c ]
121. Laos / Lao Kip [ ₭ ]
122. Latvia / European Euro [ € ]
123. Lebanon / Lebanese Pound  [ ل.ل  ]      
124. Lesotho / Lesotho Loti [ L ]
125. Liberia / Liberian Dollar [ $ ]
126. Libya / Libyan Dinar [ ل.د  ]        
127. Liechtenstein / Swiss Franc [ Fr ]
128. Lithuania / European Euro [ € ]
129. Luxembourg / European Euro  [ € ]
130. Macau (China) / Macanese Pataca [ P ]        
131. Macedonia (FYROM) / Macedonian Denar [ ден ]
132. Madagascar / Malagasy Ariary [ Ar ]      
133. Malawi / Malawian Kwacha [ MK ]    
134. Malaysia / Malaysian Ringgit [ RM ]
135. Maldives / Maldivian Rufiyaa [  .ރ ]
136. Mali / West African CFA Franc [ Fr ]       
137. Malta / European Euro [ € ]
138. Marshall Islands / United States Dollar [ $ ]
139. Martinique (France) / European Euro [ € ]
140. Mauritania / Mauritanian Ouguiya [ UM ]
141. Mauritius / Mauritian Rupee [ ₨ ]       
142. Mayotte (France) / European Euro [ € ]
143. Mexico / Mexican Peso [ $ ]
144. Micronesia / United States Dollar [ $ ]
145. Moldova / Moldovan Leu [ L ]
146. Monaco / European Euro [ € ]
147. Mongolia / Mongolian Tögrög [ ₮ ]
148. Montenegro / European Euro [ € ]
149. Montserrat (UK)  / East Caribbean Dollar [ $ ]
150. Morocco / Moroccan Dirham [  د.م. ]                                  
151. Mozambique / Mozambican Metical [ MT ]
152. Myanmar (Burma) / Burmese Kyat  [ Ks ]
153. Namibia / Namibian Dollar [ $ ]         
154. Nauru / Australian Dollar [ $ ]        
155. Nepal / Nepalese Rupee [ ₨ ]       
156. Netherlands / European Euro [ € ]
157. New Caledonia (France) / CFP Franc [ Fr ]
158. New Zealand / New Zealand Dollar [ $ ]
159. Nicaragua / Nicaraguan Cordoba [ C$ ]
160. Niger / West African CFA Franc [ Fr ]      
162. Niue (New Zealand) / New Zealand Dollar [ $ ]
163. Norfolk Island (Australia) / Australian Dollar [ $ ]
164. Northern Mariana Islands (USA) / United States Dollar [ $ ]        
165. North Korea / North Korean Won [ ₩ ]       
166. Norway / Norwegian Krone [ kr ]      
167. Oman / Omani Rial [ ر.ع. ] 
168. Pakistan / Pakistani Rupee [ ₨ ]       
169. Palau / United States Dollar [ $ ]
170. Palestine / Israeli New Shekel [ ₪ ]
171. Panama / United States Dollar [ $ ]
172. Papua New Guinea / Papua New Guinean Kina [ K ]         
173. Paraguay / Paraguayan Guarani [ ₲ ]
174. Peru / Peruvian Sol [ S/.]
175. Philippines / Philippine Peso [ ₱ ]        
176. Pitcairn Islands (UK) / New Zealand Dollar [ $ ]
177. Poland / Polish Zloty [ zł ]
178. Portugal / European Euro [ € ]
179. Puerto Rico (USA) / United States Dollar [ $ ]
180. Qatar / Qatari Riyal [ ر.ق ] 
181. Reunion (France) / European Euro [ € ]
182. Romania / Romanian Leu [ lei ]
183. Russia / Russian Ruble [ ₽ ]                                      
184. Rwanda / Rwandan Franc [ Fr ]
185. Saba (Netherlands) / United States Dollar [ $ ]
186. Saint Barthelemy (France) / European Euro [ € ]
187. Saint Helena (UK) / Saint Helena Pound [ £ ]         
188. Saint Kitts and Nevis / East Caribbean Dollar [ $ ]
189. Saint Lucia / East Caribbean Dollar [ $ ]
190. Saint Martin (France) / European Euro [ € ]        
191. Saint Pierre and Miquelon (France) / European Euro [ € ]
192. Saint Vincent and the Grenadines / East Caribbean Dollar [ $ ]
193. Samoa / Samoan Tala [ T ]
194. San Marino / European Euro [ € ]
195. Sao Tome and Principe / Sao Tome And Principe Dobra [ Db ]
196. Saudi Arabia / Saudi Arabian Riyal [ ر.س ]    
197. Senegal / West African CFA Franc [ Fr ]
198. Serbia / Serbian Dinar [ дин. Or din. ]
199. Seychelles / Seychellois Rupee [ ₨ ]       
200. Sierra Leone / Sierra Leonean Leone [ Le ]
201. Singapore / Singapore Dollar [ S$ or $]
202. Saint Eustatius (Netherlands) / United States Dollar [ $ ]        
203. Saint Maarten (Netherlands) / Netherlands Antillean Guilder [ ƒ ]
204. Slovakia / European Euro [ € ]
205. Slovenia / European Euro [ € ]
206. Solomon Islands / Solomon Islands Dollar [ $ ]
207. Somalia / Somali Shilling [ Sh ]
208. South Africa / South African Rand [ R ]        
209. South Georgia Island (UK) / Pound Sterling [ £ ]
210. South Korea / South Korean Won [ ₩ ]
211. South Sudan / South Sudanese Pound [ £ ]
212. Spain / European Euro [ € ]
213. Sri Lanka/ Sri Lankan Rupee [ Rs or රු  ]
214. Sudan / Sudanese Pound [ ج.س. ]                              
215. Suriname / Surinamese Dollar [ $ ]
216. Svalbard and Jan Mayen (Norway) / Norwegian Krone [ Kr ]
217. Swaziland / Swazi Lilangeni [ L ]         
218. Sweden / Swedish Krona [ Kr ]       
219. Switzerland / Swiss Franc [ Fr ]
220. Syria / Syrian Pound [ £ or ل.س ] 
221. Taiwan / New Taiwan Dollar [ $ ]        
222. Tajikistan / Tajikistani Somoni [ ЅМ ]
223. Tanzania / Tanzanian Shilling [ Sh ]
24. Thailand / Thai Baht [ ฿ ]         
225. Timor-Leste / United States Dollar [ $ ]
226. Togo / West African CFA Franc [ Fr ]       
227. Tokelau (New Zealand) / New Zealand Dollar [ $ ]
228. Tonga / Tongan Pa’anga [ T$ ]      
229. Trinidad and Tobago / Trinidad and Tobago Dollar [ $ ]
230. Tristan da Cunha (UK) / Pound Sterling [ £ ]
231. Tunisia / Tunisian Dinar [ ملّيم ]
232. Turkey / Turkish Lira [ ₺ ]                                       
233. Turkmenistan / Turkmen Manat [ m ]
234. Turks and Caicos Islands (UK) / United States Dollar [ $ ]
235. Tuvalu / Australian Dollar [ $ ]
236. Uganda / Ugandan Shilling [ Sh ]
237. Ukraine / Ukrainian Hryvnia [ ₴ ]
238. United Arab Emirates / UAE Dirham [ فلس ]
239. United Kingdom / British Pound [ £ ]
240. United States of America / United States Dollar [ $ ]
241. Uruguay / Uruguayan Peso [ $ ]         
242. US Virgin Islands (USA) / United States Dollar [ $ ]
243. Uzbekistan / Uzbekistani so’m [ soʻm ]                                        
244. Vanuatu / Vanuatu Vatu [ Vt ]
246. Venezuela / Venezuelan Bolivar [ Bs ]
247. Vietnam / Vietnamese Dong [ ₫ ]        
248. Wake Island (USA) / United States Dollar [ $ ]
249. Wallis and Futuna (France) / CFP Franc [ Fr ]
250. Yemen / Yemeni Rial [ ﷼ ]
251. Zambia / Zambian Kwacha [ ZK ]
252. Zimbabwe  / United States Dollar [ $ ]';

$currencies = '';

$aCurrencys = [];

foreach (explode("\n", $currency) as $aCurrency) {
  # code...
  //echo $aCurrency . '<br>';
  $sCurrency = (explode("\t", $aCurrency));

  $pos = $pos = strpos($aCurrency, '[');
  $cur = substr($aCurrency, ($pos + 1), (strpos($aCurrency, ']') - strpos($aCurrency, '[') - 1));
    $aCurrencys[] = $cur;

  	
}

$aCurrencys = array_unique($aCurrencys);

foreach($aCurrencys as $sCurrency){

  $currencies .= '<option value="' . $sCurrency . '">' . $sCurrency . '</option>';
}

?>

<div class="col-12">

	<form method="post" action="">

		

		<div class="row">

			<div class="col-sm-4">

				<div class="col-sm">

					<div class="form-group ">
					    <label for="staticEmail" class="form-label">Please select as applied to you</label>
					    
					      <select class="form-control" style="width: 100%;" name="category">

					      	<option value="">Select Category</option>
					      	<option value="I paid a bribe">I paid a bribe</option>
					      	<option value="I was offered a bribe">I was offered a bribe</option>
					      	<option value="I received a bribe">I received a bribe</option>
					      	<option value="I witnessed a bribe">I witnessed a bribe</option>
					      </select>
					    
					</div>

				</div>

				<br>

			</div>

			<div class="col-sm-4">

				<div class="form-group">
				    <label for="staticEmail" class="form-label">State of Occurrence</label>
				    
			      <select class="form-control select" style="width: 100%;" name="city" required>

			      	<option value="">Select state</option>
			      	<?php foreach($realDataset as $key => $value): ?>

			      		<option value="<?php echo $value; ?>"><?php echo explode('-',$value)[0]; ?></option>
			      	<?php endforeach; ?>
				      </select>
				    
				</div>

				<br>

			</div>

      <div class="col-sm-4">

        <div class="col-sm">

          <div class="form-group ">
              <label for="staticEmail" class="form-label">City of Occurrence</label>
              
              <input type="text" class="form-control"  placeholder="" name="location_city" required>
              
          </div>

        </div>

        <br>

      </div>

			<div class="col-sm-6">

				<div class="col-sm">

					<div class="form-group ">
					    <label for="staticEmail" class="form-label">Name of the accused person (optional)</label>
					    
					    <input type="text" class="form-control" id="staticEmail" placeholder="Name of the accused person" name="name_of_accused" >
					    
					</div>

				</div>

				<br>

			</div>

			<div class="col-sm-6">

				<div class="col-sm">

					<div class="form-group ">
					    <label for="staticEmail" class="form-label">Name of the bribery reporter</label>
					    
					    <input type="text" class="form-control" id="staticEmail" placeholder="Name of bribery reporter" name="name_of_reporter" >
					    
					</div>

				</div>

				<br>

			</div>

			<div class="col-sm-12">

				<div class="col-sm">

					<div class="form-group ">
					    <label for="staticEmail" class="form-label">Name of Company, Organisation, Ministry, Department, Agency, Institution</label>
					    
					    <input type="text" class="form-control" id="staticEmail" placeholder="Name of Company, Organisation, Ministry, Department, Agency, Institution" name="name_of_company" required>
					    
					</div>

				</div>

				<br>
			</div>

			
		</div>

		<div class="row" style="padding: 0px 20px;">

			<div class="col-sm-4">

				<div class="form-group ">
				    <label for="staticEmail" class="form-label">Date of bribery occurence (optional)</label>
				    
				    <input type="text" class="form-control date"  placeholder="Date" name="date">
				    
				</div>


			</div>


			<div class="col-sm-4">

				<div class="form-group">
				    <label for="staticEmail" class="form-label">Sector</label>
				    
			      <select class="form-control select2secto" style="width: 100%;" name="sector" required >

			      	<option value="">Select sector</option>
			      	<?php echo $sectors; ?>
			      	
				      </select>
				    
				</div>

				<br>

			</div>

			<div class="col-sm-4">

				<div class="form-group">
				    <label for="staticEmail" class="form-label">Others (Please specify)</label>
				    
			      <input type="text" class="form-control "  placeholder="other sector" name="other_sector">
				    
				</div>

				<br>

			</div>

			<div class="col-sm-4">

				<div class="form-group">
				    <label for="staticEmail" class="form-label">Form of bribe</label>
				    
			      	<select class="form-control" name="form_of_bribe">

			      		<option></option>
			      		<option value="cash">Cash</option>
			      		<option value="other">Other</option>
			      	</select>
				    
				</div>

				<br>

			</div>

      <div class="col-sm-4">

        <div class="form-group">
            <label for="staticEmail" class="form-label">Amount (Naira)</label>
            
              <input type="number" placeholder="" name="amount" class="form-control">
            
        </div>

        <br>

      </div>

			<div class="col-sm-4">

				<div class="form-group">
				    <label for="staticEmail" class="form-label">Currency</label>
				    
			      	<select class="form-control select2currenc" name="currency">

			      		<option></option>
			      		<?php echo $currencies; ?>
			      	</select>
				    
				</div>

				<br>

			</div>



			<div class="col-sm-4">

				<div class="form-group">
				    <label for="staticEmail" class="form-label">Others please specify</label>
				    
			      	<input type="type" placeholder="Please specify" name="other_bribe" class="form-control">
				    
				</div>

				<br>

			</div>


      <div class="col-sm-12">

          <div class="form-group ">
            <label for="staticEmail" class="control-label">Description</label>
            
              <textarea type="text" class="form-control"  required placeholder="Description" name="description"></textarea>
            
        </div>

        <br>

        <button class="btn btn-primary">Submit</button>
      </div>
			
		</div>

	</form>
</div>	

<script type="text/javascript">
	
	$('.select2').select2( {
				placeholder: 'Select city',
				//width: '100%',
				//containerCssClass: ':all:'
			} );

	$('.select2sector').select2( {
				placeholder: 'Select sector',
				//width: '100%',
				//containerCssClass: ':all:'
			} );

  $('.select2currency').select2( {
        placeholder: 'Currency',
        //width: '100%',
        //containerCssClass: ':all:'
      } );

	$('.date').datetimepicker({format: 'DD/MM/YYYY'});
</script>
<?php

	require_once 'foot.php';
?>
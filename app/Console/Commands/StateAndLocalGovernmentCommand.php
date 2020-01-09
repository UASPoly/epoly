<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Staff\Entities\State;

class StateAndLocalGovernmentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sospoly:state-lga-generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $bar = $this->output->createProgressBar(37);

        $bar->setBarWidth(100);

        $bar->start();

        $states = [
            'Abia',
            'Adamawa',
            'Anambra',
            'Akwa Ibom',
            'Bauchi',
            'Bayelsa',
            'Benue',
            'Borno',
            'Cross River',
            'Delta',
            'Ebonyi',
            'Edo',
            'Ekiti',
            'Enugu',
            'Gombe',
            'Imo',
            'Jigawa',
            'Kaduna',
            'Federal Capital Territory',
            'Kano',
            'Katsina',
            'Kebbi',
            'Kogi',
            'Kwara',
            'Lagos',
            'Nassarawa',
            'Niger',
            'Ogun',
            'Ondo',
            'Osun',
            'Oyo',
            'Plateu',
            'Rivers',
            'Sokoto',
            'Taraba',
            'Yobe',
            'Zamfara',
        ];
        $catchments = [22,34,37];
        
        foreach ($states as $key => $value) {
            
            $state = State::firstOrCreate(['name'=>$value]);
            if(in_array($state->id, $catchments)){
                $state->update(['catchment'=>1]);
            }

            switch ($state->id) {
                case '1':
                    foreach($this->abia() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    
                    break;
                case '2':
                    foreach($this->adamawa() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '3':
                    foreach($this->anambra() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '4':
                    foreach($this->akwaIbom() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '5':
                    foreach($this->bauchi() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '6':
                    foreach($this->bayelsa() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '7':
                    foreach($this->benue() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '8':
                    foreach($this->borno() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;

                case '9':
                    foreach($this->crossRiver() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '10':
                    foreach($this->delta() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '11':
                    foreach($this->ebonyi() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '12':
                    foreach($this->edo() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '13':
                    foreach($this->ekiti() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '14':
                    foreach($this->enugu() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '15':
                    foreach($this->gombe() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '16':
                    foreach($this->imo() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '17':
                    foreach($this->jigawa() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '18':
                    foreach($this->kaduna() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '19':
                    foreach($this->abuja() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '20':
                    foreach($this->kano() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '21':
                    foreach($this->katsina() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '22':
                    foreach($this->kebbi() as $this_lga){
                        $state->lgas()->firstOrCreate(['name'=>$this_lga]);
                    }
                    
                    break;
                case '23':
                    foreach($this->kogi() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '24':
                    foreach($this->kwara() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '25':
                    foreach($this->lagos() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '26':
                    foreach($this->nasarawa() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '27':
                    foreach($this->niger() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '28':
                    foreach($this->ogun() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '29':
                    foreach($this->ondo() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '30':
                    foreach($this->osun() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '31':
                    foreach($this->oyo() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '32':
                    foreach($this->plateu() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '33':
                    foreach($this->rivers() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '34':
                    foreach($this->sokoto() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    
                    break;
                case '35':
                    foreach($this->taraba() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '36':
                    foreach($this->yobe() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                    break;
                case '37':
                    foreach($this->zamfara() as $lga){
                        $state->lgas()->firstOrCreate(['name'=>$lga]);
                    }
                   
                    break;      
                default:
                    # code...
                    break;
            }
            $bar->advance();
        } 
        $bar->finish();
    }

    public function abia()
    {
        return [
            'Aba North', 'Aba South', 'Arochukwu', 'Bende', 'Isiala Ngwa South', 'Ikwuano', 'Isiala', 'Ngwa North', 'Isukwuato', 'Ukwa West', 'Ukwa East', 'Umuahia', 'Umuahia South'
        ];
    }

    public function adamawa()
    {
        return [
            'Demsa', 'Fufore', 'Ganye', 'Girei', 'Gombi', 'Jada', 'Yola North', 'Lamurde', 'Madagali', 'Maiha', 'Mayo-Belwa', 'Michika', 'Mubi South', 'Numna', 'Shelleng', 'Song','Toungo', 'Jimeta', 'Yola South', 'Hung'
        ];
    }

    public function anambra()
    {
        return [
            'Aguata','Anambra', 'Anambra West', 'Anaocha', 'Awka South', 'Awka North', 'Ogbaru', 'Onitsha South', 'Onitsha North', 'Orumba North', 'Orumba South', 'Oyi'
        ];
    }

    public function akwaIbom()
    {
        return [
            'Abak', 'Eastern Obolo', 'Eket', 'Essien Udim', 'Etimekpo', 'Etinan', 'Ibeno', 'Ibesikpo Asutan', 'Ibiono Ibom', 'Ika', 'Ikono','Ikot Abasi', 'Ikot Ekpene', 'Ini', 'Itu', 'Mbo', 'Mkpat Enin', 'Nsit Ibom', 'Nsit Ubium', 'Obot Akara', 'Okobo', 'Onna', 'Orukanam', 'Oron', 'Udung Uko','Ukanafun','Esit Eket', 'Uruan', 'Urue Offoung', 'Oruko Ete', 'Uyo'
        ];
    }
    public function bauchi()
    {
        return [
           'Alkaleri', 'Bauchi', 'Bogoro', 'Darazo', 'Dass', 'Gamawa', 'Ganjuwa', 'Giade', 'Jama`are', 'Katagum', 'Kirfi', 'Misau', 'Ningi', 'hira', 'Tafawa Balewa', 'Itas gadau', 'Toro','Warji', 'Zaki', 'Dambam'
        ];
    }
    public function bayelsa()
    {
        return [
            'Brass', 'Ekeremor', 'Kolok/Opokuma', 'Nembe', 'Ogbia', 'Sagbama','Southern Ijaw', 'Yenagoa', 'Membe'
        ];
    }

    public function benue()
    {
        return [
            'Ador', 'Agatu', 'Apa', 'Buruku', 'Gboko', 'Guma', 'Gwer east', 'Gwer west', 'Kastina','Ala', 'Konshisha', 'Kwande', 'Logo', 'Makurdii', 'Obi', 'Ogbadibo', 'Ohimini', 'Oju', 'Okpokwu', 'Oturkpo', 'Tarka', 'Ukum', 'Vandekya'
        ];
    }

    public function borno()
    {
        return [
            'Abadan', 'Askira/Uba', 'Bama','Bayo', 'Biu', 'Chibok', 'Damboa', 'Dikwagubio', 'Guzamala', 'Gwoza', 'Hawul', 'Jere', 'Kaga', 'Kalka/Balge', 'Konduga', 'Kukawa', 'Kwaya-ku', 'Mafa', 'Magumeri', 'Maiduguri', 'Marte', 'Mobbar', 'Monguno', 'Ngala', 'Nganzai', 'Shani'

        ];
    }

    public function crossRiver()
    {
        return [
            'Abia', 'Akampa', 'Akpabuyo', 'Bakassi', 'Bekwara', 'Biase', 'Boki', 'Calabar south', 'Etung', 'Ikom', 'Obanliku', 'Obubra', 'Obudu', 'Odukpani', 'Ogoja', 'Ugep north', 'Yala', 'Yarkur'
        ];
    }

    public function delta()
    {
        return [
            'Aniocha south', 'Anioha', 'Bomadi', 'Burutu', 'Ethiope west', 'Ethiope east', 'Ika south', 'Ika north east', 'Isoko south','Isoko north', 'Ndokwa east', 'Ndokwa west', 'Okpe','Oshimili north', 'Oshimili south', 'Patani', 'Sapele', 'Udu', 'Ughelli south', 'Ughelli north', 'Ukwuani', 'Uviwie', 'Warri central', 'Warri north', 'Warri south'
        ];
    }

    public function ebonyi()
    {
        return [
            'Abakaliki', 'Afikpo south', 'Afikpo north', 'Ebonyi','Ezza', 'Ezza south', 'Ikwo', 'Ishielu', 'Ivo', 'Ohaozara', 'Ohaukwu', 'Onicha', 'Izzi'
        ];
    }
    
    public function edo()
    {
        return [
            'Akoko-Edo', 'Egor','Essann east', 'Esan south east', 'Esan central','Esan west', 'Etsako central', 'Etsako east', 'Etsako', 'Orhionwon','Ivia north','Ovia south west', 'Owan west', 'Owan south', 'Uhunwonde'
        ];
    }
    
    public function ekiti()
    {
        return [
            'Ado Ekiti', 'Effon Alaiye', 'Ekiti south west', 'Ekiti west', 'Ekiti east', 'Emure/ise', 'Orun', 'Ido','Osi', 'Ijero', 'Ikere', 'Ikole', 'Ilejemeje','Irepodun', 'Ise/Orun','Moba', 'Oye', 'Aiyekire'
        ];
    } 
    
    public function enugu()
    {
        return [
            'Awgu', 'Aninri', 'Enugu east', 'Enugu south', 'Enugu north', 'Ezeagu', 'Igbo Eze north', 'Igbi etiti', 'Nsukka','Oji river', 'Undenu','Uzo Uwani', 'Udi'
        ];
    }

    public function gombe()
    {
        return [
            'Akko', 'Balanga', 'Billiri', 'Dukku', 'Dunakaye', 'Gombe', 'Kaltungo', 'Kwami', 'Nafada/Bajoga', 'Shomgom', 'Yamaltu/Deba'
        ];
    }
    
    public function imo()
    {
        return [
            'Aboh-mbaise', 'Ahiazu-Mbaise', 'Ehime-Mbaino', 'Ezinhite', 'Ideato North', 'Ideato south', 'Ihitte/Uboma', 'Ikeduru', 'Isiala', 'Isu', 'Mbaitoli', 'Ngor Okpala', 'Njaba', 'Nwangele', 'Nkwere', 'Obowo', 'Aguta', 'Ohaji Egbema', 'Okigwe', 'Onuimo', 'Orlu', 'Orsu', 'Oru west', 'Oru', 'Owerri', 'Owerri North', 'Owerri south'
        ];
    }

    public function jigawa()
    {
        return [
            'Auyo', 'Babura', 'Birnin- Kudu', 'Birniwa', 'Buji', 'Dute', 'Garki', 'Gagarawa', 'Gumel' , 'Guri', 'Gwaram', 'Gwiwa', 'Hadeji', 'Jahun', 'Kafin-Hausa', 'kaugama', 'Kazaure', 'Kirikisamma', 'Birnin-magaji', 'Maigatari', 'Malamaduri', 'Miga', 'Ringim', 'Roni', 'Sule Tankarka', 'Taura', 'Yankwasi'
        ];
    }

    public function kaduna()
    {
        return [
            'Brnin Gwari', 'Chukun', 'Giwa', 'Kajuru', 'Igabi', 'Ikara', 'Jaba', 'Jema`a', 'Kachia', 'Kaduna North', 'Kaduna south', 'Kagarok', 'Kauru', 'Kabau', 'Kudan', 'Kere', 'Makarfi', 'Sabongari', 'Sanga', 'Soba', 'Zangon-Kataf', 'Zaria'
        ];
    }

    public function abuja()
    {
        return [
            'Abaji', 'Abuja Municipal', 'Bwari', 'Gwagwalada', 'Kuje', 'Kwali'
        ];
    }

    public function kano()
    {
        return [
            'Ajigi', 'Albasu', 'Bagwai', 'Bebeji', 'Bichi', 'Bunkure', 'Dala', 'Dambatta', 'Dawakin kudu', 'Dawakin tofa', 'doguwa', 'Fagge', 'Gabasawa', 'Garko', 'Garun mallam', 'Gaya', 'Gezawa', 'Gwale', 'Gwarzo', 'Kano', 'Karay', 'Kibiya', 'Kiru', 'Kumbtso', 'Kunch', 'Kura', 'Maidobi', 'Makoda', 'MInjibir', 'Nassarawa', 'Rano', 'Rimin gado', 'Rogo', 'Shanono', 'Sumaila', 'Takai', 'Tarauni', 'Tofa', 'Tsanyawa', 'Tudunwada', 'Ungogo', 'Warawa', 'Wudil'
        ];
    }
    
    public function katsina()
    {
        return [
            'Bakori', 'Batagarawa', 'Batsari', 'Baure', 'Bindawa', 'Charanchi', 'Dan- Musa', 'Dandume','Danja', 'Daura', 'Dutsi', 'Dutsin `ma', 'Faskar', 'Funtua', 'Ingawa', 'Jibiya', 'Kafur', 'Kaita', 'Kankara', 'Kankiya', 'Katsina', 'Furfi', 'Kusada.Mai aduwa', 'Malumfashi', 'Mani', 'Mash', 'Matazu', 'Musawa', 'Rimi', 'Sabuwa', 'Safana', 'Sandamu','Zango'
        ];
    }
    public function kebbi()
    {
        return [
            'Aliero', 'Arewa Dandi', 'Argungu', 'Augie', 'Bagudo', 'Birnin Kebbi', 'Bunza', 'Dandi', 'Danko Wasugu', 'Fakai', 'Gwandu', 'Jeda', 'Kalgo', 'Koko Besse', 'Maiyaama', 'Ngaski', 'Sakaba', 'Shanga', 'Suru', 'Yauri', 'Zuru'
        ];
    }

    public function kogi()
    {
        return [
            'Adavi', 'Ajaokuta', 'Ankpa', 'Bassa', 'Dekina', 'Yagba east', 'Ibaji', 'Idah', 'Igalamela', 'Ijumu', 'Kabba bunu', 'Kogi', 'Mopa muro', 'Ofu', 'Ogori magongo', 'Okehi', 'Okene', 'Olamaboro', 'Omala', 'Yagba west'
       ];
    }

    public function kwara()
    {
        return [
            'Asa', 'Baruten', 'Ede', 'Ekiti', 'Ifelodun', 'Ilorin south', 'Ilorin west', 'Ilorin east', 'Irepodun', 'Isin', 'Kaiama', 'Moro', 'Offa', 'Oke ero', 'Oyun', 'Pategi'
        ];
    }

    public function lagos()
    {
        return ['Agege', 'Alimosho Ifelodun', 'Alimosho', 'Amuwo-Odofin', 'Apapa', 'Badagry', 'Epe', 'Eti-Osa', 'Ibeju- Lekki','Ifako/Ijaye', 'Ikeja', 'Ikorodu', 'Kosofe', 'Lagos Island', 'Lagos Mainland', 'Mushin', 'Ojo', 'Oshodi-Isolo', 'Shomolu','Surulere'
        ];
    }

    public function nasarawa()
    {
        return [
            'Akwanga', 'Awe', 'Doma', 'Karu', 'Keana', 'Keffi', 'Kokona', 'Lafia', 'Nassarawa', 'Nassarawa/Eggon', 'Obi', 'Toto', 'Wamba'
        ];
    }

    public function niger()
    {
        return [
            'Agaie', 'Agwara', 'Bida', 'Borgu', 'Bosso', 'Chanchanga', 'Edati', 'Gbako', 'Gurara', 'Kitcha', 'Kontagora','Lapai', 'Lavun', 'Magama', 'Mariga', 'Mokwa', 'Moshegu', 'Muya', 'Paiko','Rafi', 'Shiroro', 'Suleija', 'Tawa-Wushishi'
        ];
    }

    public function ogun()
    {
        return [
            'Abeokuta south','Abeokuta north', 'Ado-odo/otta', 'Agbado south', 'Agbado north', 'Ewekoro', 'Idarapo', 'Ifo', 'Ijebu east', 'Ijebu north', 'Ikenne', 'Ilugun Alaro', 'Imeko afon', 'Ipokia', 'Obafemi/owode', 'Odeda', 'Odogbolu', 'Ogun waterside', 'Sagamu'
        ];
    }
     
    public function ondo()
    {
        return [
            'Akoko north', 'Akoko north east', 'Akoko south east', 'Akoko south', 'Akure north', 'Akure', 'Idanre', 'Ifedore', 'Ese odo', 'Ilaje', 'Ilaje oke-igbo', 'Irele', 'Odigbo', 'Okitipupa', 'Ondo', 'Ondo east', 'Ose', 'Owo'
        ];
    } 
    
    public function osun()
    {
        return [
            'Atakumosa west', 'Atakumosa east', 'Ayeda-ade', 'Ayedire', 'Bolawaduro', 'Boripe', 'Ede', 'Ede north', 'Egbedore', 'Ejigbo', 'Ife north', 'Ife central', 'Ife south', 'Ife east', 'Ifedayo', 'Ifelodun', 'Ilesha west', 'Ila- orangun', 'Ilesah east', 'Irepodun', 'Irewole', 'Isokan', 'Iwo', 'Obokun', 'Odo-otin', 'ola oluwa', 'olorunda', 'Oriade', 'Orolu', 'Osogbo'
        ];
    }

    public function oyo()
    {
        return [
            'Afijio', 'Akinyele', 'Attba', 'Atigbo', 'Egbeda', 'Ibadan', 'north east', 'Ibadan central', 'Ibadan south east', 'Ibadan west south', 'Ibarapa east', 'Ibarapa north', 'Ido', 'Ifedapo', 'Ifeloju', 'Irepo','Iseyin', 'Itesiwaju', 'Iwajowa', 'Iwajowa olorunshogo', 'Kajola', 'Lagelu', 'Ogbomosho north', 'Ogbomosho south', 'Ogo oluwa', 'Oluyole','Ona ara', 'Ore lope', 'Orire','Oyo east', 'Oyo west', 'Saki east', 'Saki west', 'Surulere'
        ];
    }
    public function plateu()
    {
        return [
            'Barkin/ladi', 'Bassa', 'Bokkos', 'Jos','north', 'Jos east', 'Jos south', 'Kanam', 'kiyom', 'Langtang north', 'Langtang south', 'Mangu', 'Mikang', 'Pankshin', 'Qua`an pan','Shendam', 'Wase'
        ];
    }
    
    public function rivers()
    {
        return [
            'Abua/Odial', 'Ahoada west', 'Akuku toru', 'Andoni', 'Asari toru', 'Bonny', 'Degema', 'Eleme', 'Emohua', 'Etche', 'Gokana', 'Ikwerre', 'Oyigbo', 'Khana', 'Obio/Akpor', 'Ogba east /Edoni', 'Ogu/bolo', 'Okrika', 'Omumma', 'Opobo/Nkoro', 'Portharcourt','Tai'
        ];
    }
 
    public function sokoto()
    {
        return [
            'Binji', 'Bodinga', 'Dange/Shuni', 'Gada', 'Goronyo', 'Gudu', 'Gwadabawa', 'Illela', 'Isa', 'Kebbe', 'Kware', 'Rabah', 'Sabon Birni', 'Shagari', 'Silame', 'Sokoto South', 'Sokoto North', 'Tambuwal', 'Tangaza', 'Tureta', 'Wamakko','Wurno', 'Yabo'
        ];
    }

    public function taraba()
    {
        return [
            'Akdo -kola', 'Bali', 'Donga', 'Gashaka', 'Gassol', 'Ibi', 'Jalingo', 'K/Lamido', 'Kurmi', 'lan', 'Sardauna', 'Tarum', 'Ussa', 'Wukari', 'Yorro', 'Zing'
        ];
    }
    public function yobe()
    {
        return [
            'Borsari', 'Damaturu', 'Fika', 'Fune', 'Geidam', 'Gogaram', 'Gujba', 'Gulani', 'Jakusko', 'Karasuwa', 'Machina', 'Nagere', 'Nguru', 'Potiskum', 'Tarmua', 'Yunusari', 'Yusufari','G ashua'
        ];
    }
    
    public function zamfara()
    {
        return [
            'Anka', 'Bakura','Birnin Magaji','Bukkuyum', 'Bungudu', 'Gummi', 'Gusau', 'Kaura Namoda','Maradun', 'Maru', 'Shinkafi', 'Talata Mafara', 'Zurmi'
        ];
    }
}

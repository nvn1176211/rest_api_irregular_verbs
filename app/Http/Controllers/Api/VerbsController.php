<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cache;

use function GuzzleHttp\json_decode;

class VerbsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(json_decode($this->irregular_verbs));
        
        return json_decode($this->irregular_verbs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, "https://www.englishclub.com/vocabulary/irregular-verbs-list.htm");
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // $out1 = curl_exec($ch);
    // curl_close($ch);

    public $irregular_verbs = '{"awake":{"v2":"awoke","v3":"awoken"},"be":{"v2":"was, were","v3":"been"},"beat":{"v2":"beat","v3":"beaten"},"become":{"v2":"became","v3":"become"},"begin":{"v2":"began","v3":"begun"},"bend":{"v2":"bent","v3":"bent"},"bet":{"v2":"bet","v3":"bet"},"bid":{"v2":"bid","v3":"bid"},"bite":{"v2":"bit","v3":"bitten"},"blow":{"v2":"blew","v3":"blown"},"break":{"v2":"broke","v3":"broken"},"bring":{"v2":"brought","v3":"brought"},"broadcast":{"v2":"broadcast","v3":"broadcast"},"build":{"v2":"built","v3":"built"},"burn":{"v2":"burned or<\/em> burnt","v3":"burned or<\/em> burnt"},"buy":{"v2":"bought","v3":"bought"},"catch":{"v2":"caught","v3":"caught"},"choose":{"v2":"chose","v3":"chosen"},"come":{"v2":"came","v3":"come"},"cost":{"v2":"cost","v3":"cost"},"cut":{"v2":"cut","v3":"cut"},"dig":{"v2":"dug","v3":"dug"},"do":{"v2":"did","v3":"done"},"draw":{"v2":"drew","v3":"drawn"},"dream":{"v2":"dreamed or<\/em> dreamt","v3":"dreamed or<\/em> dreamt"},"drive":{"v2":"drove","v3":"driven"},"drink":{"v2":"drank","v3":"drunk"},"eat":{"v2":"ate","v3":"eaten"},"fall":{"v2":"fell","v3":"fallen"},"feel":{"v2":"felt","v3":"felt"},"fight":{"v2":"fought","v3":"fought"},"find":{"v2":"found","v3":"found"},"fly":{"v2":"flew","v3":"flown"},"forget":{"v2":"forgot","v3":"forgotten"},"forgive":{"v2":"forgave","v3":"forgiven"},"freeze":{"v2":"froze","v3":"frozen"},"get":{"v2":"got","v3":"got (sometimes<\/em> gotten)"},"give":{"v2":"gave","v3":"given"},"go":{"v2":"went","v3":"gone"},"grow":{"v2":"grew","v3":"grown"},"hang":{"v2":"hung","v3":"hung"},"have":{"v2":"had","v3":"had"},"hear":{"v2":"heard","v3":"heard"},"hide":{"v2":"hid","v3":"hidden"},"hit":{"v2":"hit","v3":"hit"},"hold":{"v2":"held","v3":"held"},"hurt":{"v2":"hurt","v3":"hurt"},"keep":{"v2":"kept","v3":"kept"},"know":{"v2":"knew","v3":"known"},"lay":{"v2":"laid","v3":"laid"},"lead":{"v2":"led","v3":"led"},"learn":{"v2":"learned or<\/em> learnt","v3":"learned or<\/em> learnt"},"leave":{"v2":"left","v3":"left"},"lend":{"v2":"lent","v3":"lent"},"let":{"v2":"let","v3":"let"},"lie":{"v2":"lay","v3":"lain"},"lose":{"v2":"lost","v3":"lost"},"make":{"v2":"made","v3":"made"},"mean":{"v2":"meant","v3":"meant"},"meet":{"v2":"met","v3":"met"},"pay":{"v2":"paid","v3":"paid"},"put":{"v2":"put","v3":"put"},"read":{"v2":"read","v3":"read"},"ride":{"v2":"rode","v3":"ridden"},"ring":{"v2":"rang","v3":"rung"},"rise":{"v2":"rose","v3":"risen"},"run":{"v2":"ran","v3":"run"},"say":{"v2":"said","v3":"said"},"see":{"v2":"saw","v3":"seen"},"sell":{"v2":"sold","v3":"sold"},"send":{"v2":"sent","v3":"sent"},"show":{"v2":"showed","v3":"showed or<\/em> shown"},"shut":{"v2":"shut","v3":"shut"},"sing":{"v2":"sang","v3":"sung"},"sink":{"v2":"sank","v3":"sunk"},"sit":{"v2":"sat","v3":"sat"},"sleep":{"v2":"slept","v3":"slept"},"speak":{"v2":"spoke","v3":"spoken"},"spend":{"v2":"spent","v3":"spent"},"stand":{"v2":"stood","v3":"stood"},"stink":{"v2":"stank","v3":"stunk"},"swim":{"v2":"swam","v3":"swum"},"take":{"v2":"took","v3":"taken"},"teach":{"v2":"taught","v3":"taught"},"tear":{"v2":"tore","v3":"torn"},"tell":{"v2":"told","v3":"told"},"think":{"v2":"thought","v3":"thought"},"throw":{"v2":"threw","v3":"thrown"},"understand":{"v2":"understood","v3":"understood"},"wake":{"v2":"woke","v3":"woken"},"wear":{"v2":"wore","v3":"worn"},"win":{"v2":"won","v3":"won"},"write":{"v2":"wrote","v3":"written"}}';
}

@extends('layouts.app')
@section('title', __('bomb.create_bomb') . ' - ' . __('app.app_name'))
@section('content')
    <div class="w-full mb-[100px] p-4 flex flex-col justify-center items-center">
        @if (session('success'))
            <div class="w-full max-w-2xl border border-green-600 flex p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium">{{ session('success') }}
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div
                class="w-full max-w-2xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <span class="font-medium">Ensure that these requirements are met:</span>
                        <ul class="mt-1.5 ml-4 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <div
            class="w-full max-w-2xl mt-6 p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">

            <form class="space-y-6" method="POST" action="{{ route('bomb.save') }}" enctype="multipart/form-data">
                @csrf
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">
                    {{ __('bomb.create_bomb') }}</h5>

                <div>
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('bomb.enter_name') }}</label>
                    <input type="text" name="name" id="name"
                        placeholder="{{ __('bomb.enter_name_placeholder') }}" value="{{ old('name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                </div>
                <div>
                    <label for="type"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('bomb.enter_type') }}</label>
                    <select id="type" name="type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        <option disabled selected value>{{ __('bomb.enter_type_placeholder') }}</option>
                        <option value="atomic_bomb">{{ __('bomb.atomic_bomb') }}</option>
                        <option value="hydrogen_bomb">{{ __('bomb.hydrogen_bomb') }}</option>
                        <option value="neutron_bomb">{{ __('bomb.neutron_bomb') }}</option>
                        <option value="dirty_bomb">{{ __('bomb.dirty_bomb') }}</option>
                        <option value="cobalt_bomb">{{ __('bomb.cobalt_bomb') }}</option>
                        <option value="backpack_nuke">{{ __('bomb.backpack_nuke') }}</option>
                    </select>
                </div>
                <div>
                    <label for="price"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('bomb.enter_price') }}</label>
                    <input type="number" name="price" id="price"
                        placeholder="{{ __('bomb.enter_price_placeholder') }}" value="{{ old('price') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                </div>
                <div>
                    <label for="location_country"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('bomb.enter_location_country') }}</label>
                    <select id="location_country" name="location_country"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        <option disabled selected value>{{ __('bomb.enter_location_country_placeholder') }}
                        </option>
                        <option value="AF">{{ __('countries.AF') }}</option>
                        <option value="AX">{{ __('countries.AX') }}</option>
                        <option value="AL">{{ __('countries.AL') }}</option>
                        <option value="DZ">{{ __('countries.DZ') }}</option>
                        <option value="AS">{{ __('countries.AS') }}</option>
                        <option value="AD">{{ __('countries.AD') }}</option>
                        <option value="AO">{{ __('countries.AO') }}</option>
                        <option value="AI">{{ __('countries.AI') }}</option>
                        <option value="AQ">{{ __('countries.AQ') }}</option>
                        <option value="AG">{{ __('countries.AG') }}</option>
                        <option value="AR">{{ __('countries.AR') }}</option>
                        <option value="AM">{{ __('countries.AM') }}</option>
                        <option value="AW">{{ __('countries.AW') }}</option>
                        <option value="AU">{{ __('countries.AU') }}</option>
                        <option value="AT">{{ __('countries.AT') }}</option>
                        <option value="AZ">{{ __('countries.AZ') }}</option>
                        <option value="BS">{{ __('countries.BS') }}</option>
                        <option value="BH">{{ __('countries.BH') }}</option>
                        <option value="BD">{{ __('countries.BD') }}</option>
                        <option value="BB">{{ __('countries.BB') }}</option>
                        <option value="BY">{{ __('countries.BY') }}</option>
                        <option value="BE">{{ __('countries.BE') }}</option>
                        <option value="BZ">{{ __('countries.BZ') }}</option>
                        <option value="BJ">{{ __('countries.BJ') }}</option>
                        <option value="BM">{{ __('countries.BM') }}</option>
                        <option value="BT">{{ __('countries.BT') }}</option>
                        <option value="BO">{{ __('countries.BO') }}</option>
                        <option value="BQ">{{ __('countries.BQ') }}</option>
                        <option value="BA">{{ __('countries.BA') }}</option>
                        <option value="BW">{{ __('countries.BW') }}</option>
                        <option value="BV">{{ __('countries.BV') }}</option>
                        <option value="BR">{{ __('countries.BR') }}</option>
                        <option value="IO">{{ __('countries.IO') }}</option>
                        <option value="BN">{{ __('countries.BN') }}</option>
                        <option value="BG">{{ __('countries.BG') }}</option>
                        <option value="BF">{{ __('countries.BF') }}</option>
                        <option value="BI">{{ __('countries.BI') }}</option>
                        <option value="KH">{{ __('countries.KH') }}</option>
                        <option value="CM">{{ __('countries.CM') }}</option>
                        <option value="CA">{{ __('countries.CA') }}</option>
                        <option value="CV">{{ __('countries.CV') }}</option>
                        <option value="KY">{{ __('countries.KY') }}</option>
                        <option value="CF">{{ __('countries.CF') }}</option>
                        <option value="TD">{{ __('countries.TD') }}</option>
                        <option value="CL">{{ __('countries.CL') }}</option>
                        <option value="CN">{{ __('countries.CN') }}</option>
                        <option value="CX">{{ __('countries.CX') }}</option>
                        <option value="CC">{{ __('countries.CC') }}</option>
                        <option value="CO">{{ __('countries.CO') }}</option>
                        <option value="KM">{{ __('countries.KM') }}</option>
                        <option value="CG">{{ __('countries.CG') }}</option>
                        <option value="CD">{{ __('countries.CD') }}</option>
                        <option value="CK">{{ __('countries.CK') }}</option>
                        <option value="CR">{{ __('countries.CR') }}</option>
                        <option value="CI">{{ __('countries.CI') }}</option>
                        <option value="HR">{{ __('countries.HR') }}</option>
                        <option value="CU">{{ __('countries.CU') }}</option>
                        <option value="CW">{{ __('countries.CW') }}</option>
                        <option value="CY">{{ __('countries.CY') }}</option>
                        <option value="CZ">{{ __('countries.CZ') }}</option>
                        <option value="DK">{{ __('countries.DK') }}</option>
                        <option value="DJ">{{ __('countries.DJ') }}</option>
                        <option value="DM">{{ __('countries.DM') }}</option>
                        <option value="DO">{{ __('countries.DO') }}</option>
                        <option value="EC">{{ __('countries.EC') }}</option>
                        <option value="EG">{{ __('countries.EG') }}</option>
                        <option value="SV">{{ __('countries.SV') }}</option>
                        <option value="GQ">{{ __('countries.GQ') }}</option>
                        <option value="ER">{{ __('countries.ER') }}</option>
                        <option value="EE">{{ __('countries.EE') }}</option>
                        <option value="ET">{{ __('countries.ET') }}</option>
                        <option value="FK">{{ __('countries.FK') }}</option>
                        <option value="FO">{{ __('countries.FO') }}</option>
                        <option value="FJ">{{ __('countries.FJ') }}</option>
                        <option value="FI">{{ __('countries.FI') }}</option>
                        <option value="FR">{{ __('countries.FR') }}</option>
                        <option value="GF">{{ __('countries.GF') }}</option>
                        <option value="PF">{{ __('countries.PF') }}</option>
                        <option value="TF">{{ __('countries.TF') }}</option>
                        <option value="GA">{{ __('countries.GA') }}</option>
                        <option value="GM">{{ __('countries.GM') }}</option>
                        <option value="GE">{{ __('countries.GE') }}</option>
                        <option value="DE">{{ __('countries.DE') }}</option>
                        <option value="GH">{{ __('countries.GH') }}</option>
                        <option value="GI">{{ __('countries.GI') }}</option>
                        <option value="GR">{{ __('countries.GR') }}</option>
                        <option value="GL">{{ __('countries.GL') }}</option>
                        <option value="GD">{{ __('countries.GD') }}</option>
                        <option value="GP">{{ __('countries.GP') }}</option>
                        <option value="GU">{{ __('countries.GU') }}</option>
                        <option value="GT">{{ __('countries.GT') }}</option>
                        <option value="GG">{{ __('countries.GG') }}</option>
                        <option value="GN">{{ __('countries.GN') }}</option>
                        <option value="GW">{{ __('countries.GW') }}</option>
                        <option value="GY">{{ __('countries.GY') }}</option>
                        <option value="HT">{{ __('countries.HT') }}</option>
                        <option value="HM">{{ __('countries.HM') }}</option>
                        <option value="VA">{{ __('countries.VA') }}</option>
                        <option value="HN">{{ __('countries.HN') }}</option>
                        <option value="HK">{{ __('countries.HK') }}</option>
                        <option value="HU">{{ __('countries.HU') }}</option>
                        <option value="IS">{{ __('countries.IS') }}</option>
                        <option value="IN">{{ __('countries.IN') }}</option>
                        <option value="ID">{{ __('countries.ID') }}</option>
                        <option value="IR">{{ __('countries.IR') }}</option>
                        <option value="IQ">{{ __('countries.IQ') }}</option>
                        <option value="IE">{{ __('countries.IE') }}</option>
                        <option value="IM">{{ __('countries.IM') }}</option>
                        <option value="IL">{{ __('countries.IL') }}</option>
                        <option value="IT">{{ __('countries.IT') }}</option>
                        <option value="JM">{{ __('countries.JM') }}</option>
                        <option value="JP">{{ __('countries.JP') }}</option>
                        <option value="JE">{{ __('countries.JE') }}</option>
                        <option value="JO">{{ __('countries.JO') }}</option>
                        <option value="KZ">{{ __('countries.KZ') }}</option>
                        <option value="KE">{{ __('countries.KE') }}</option>
                        <option value="KI">{{ __('countries.KI') }}</option>
                        <option value="KP">{{ __('countries.KP') }}</option>
                        <option value="KR">{{ __('countries.KR') }}</option>
                        <option value="XK">{{ __('countries.XK') }}</option>
                        <option value="KW">{{ __('countries.KW') }}</option>
                        <option value="KG">{{ __('countries.KG') }}</option>
                        <option value="LA">{{ __('countries.LA') }}</option>
                        <option value="LV">{{ __('countries.LV') }}</option>
                        <option value="LB">{{ __('countries.LB') }}</option>
                        <option value="LS">{{ __('countries.LS') }}</option>
                        <option value="LR">{{ __('countries.LR') }}</option>
                        <option value="LY">{{ __('countries.LY') }}</option>
                        <option value="LI">{{ __('countries.LI') }}</option>
                        <option value="LT">{{ __('countries.LT') }}</option>
                        <option value="LU">{{ __('countries.LU') }}</option>
                        <option value="MO">{{ __('countries.MO') }}</option>
                        <option value="MK">{{ __('countries.MK') }}</option>
                        <option value="MG">{{ __('countries.MG') }}</option>
                        <option value="MW">{{ __('countries.MW') }}</option>
                        <option value="MY">{{ __('countries.MY') }}</option>
                        <option value="MV">{{ __('countries.MV') }}</option>
                        <option value="ML">{{ __('countries.ML') }}</option>
                        <option value="MT">{{ __('countries.MT') }}</option>
                        <option value="MH">{{ __('countries.MH') }}</option>
                        <option value="MQ">{{ __('countries.MQ') }}</option>
                        <option value="MR">{{ __('countries.MR') }}</option>
                        <option value="MU">{{ __('countries.MU') }}</option>
                        <option value="YT">{{ __('countries.YT') }}</option>
                        <option value="MX">{{ __('countries.MX') }}</option>
                        <option value="FM">{{ __('countries.FM') }}</option>
                        <option value="MD">{{ __('countries.MD') }}</option>
                        <option value="MC">{{ __('countries.MC') }}</option>
                        <option value="MN">{{ __('countries.MN') }}</option>
                        <option value="ME">{{ __('countries.ME') }}</option>
                        <option value="MS">{{ __('countries.MS') }}</option>
                        <option value="MA">{{ __('countries.MA') }}</option>
                        <option value="MZ">{{ __('countries.MZ') }}</option>
                        <option value="MM">{{ __('countries.MM') }}</option>
                        <option value="NA">{{ __('countries.NA') }}</option>
                        <option value="NR">{{ __('countries.NR') }}</option>
                        <option value="NP">{{ __('countries.NP') }}</option>
                        <option value="NL">{{ __('countries.NL') }}</option>
                        <option value="AN">{{ __('countries.AN') }}</option>
                        <option value="NC">{{ __('countries.NC') }}</option>
                        <option value="NZ">{{ __('countries.NZ') }}</option>
                        <option value="NI">{{ __('countries.NI') }}</option>
                        <option value="NE">{{ __('countries.NE') }}</option>
                        <option value="NG">{{ __('countries.NG') }}</option>
                        <option value="NU">{{ __('countries.NU') }}</option>
                        <option value="NF">{{ __('countries.NF') }}</option>
                        <option value="MP">{{ __('countries.MP') }}</option>
                        <option value="NO">{{ __('countries.NO') }}</option>
                        <option value="OM">{{ __('countries.OM') }}</option>
                        <option value="PK">{{ __('countries.PK') }}</option>
                        <option value="PW">{{ __('countries.PW') }}</option>
                        <option value="PS">{{ __('countries.PS') }}</option>
                        <option value="PA">{{ __('countries.PA') }}</option>
                        <option value="PG">{{ __('countries.PG') }}</option>
                        <option value="PY">{{ __('countries.PY') }}</option>
                        <option value="PE">{{ __('countries.PE') }}</option>
                        <option value="PH">{{ __('countries.PH') }}</option>
                        <option value="PN">{{ __('countries.PN') }}</option>
                        <option value="PL">{{ __('countries.PL') }}</option>
                        <option value="PT">{{ __('countries.PT') }}</option>
                        <option value="PR">{{ __('countries.PR') }}</option>
                        <option value="QA">{{ __('countries.QA') }}</option>
                        <option value="RE">{{ __('countries.RE') }}</option>
                        <option value="RO">{{ __('countries.RO') }}</option>
                        <option value="RU">{{ __('countries.RU') }}</option>
                        <option value="RW">{{ __('countries.RW') }}</option>
                        <option value="BL">{{ __('countries.BL') }}</option>
                        <option value="SH">{{ __('countries.SH') }}</option>
                        <option value="KN">{{ __('countries.KN') }}</option>
                        <option value="LC">{{ __('countries.LC') }}</option>
                        <option value="MF">{{ __('countries.MF') }}</option>
                        <option value="PM">{{ __('countries.PM') }}</option>
                        <option value="VC">{{ __('countries.VC') }}</option>
                        <option value="WS">{{ __('countries.WS') }}</option>
                        <option value="SM">{{ __('countries.SM') }}</option>
                        <option value="ST">{{ __('countries.ST') }}</option>
                        <option value="SA">{{ __('countries.SA') }}</option>
                        <option value="SN">{{ __('countries.SN') }}</option>
                        <option value="RS">{{ __('countries.RS') }}</option>
                        <option value="CS">{{ __('countries.CS') }}</option>
                        <option value="SC">{{ __('countries.SC') }}</option>
                        <option value="SL">{{ __('countries.SL') }}</option>
                        <option value="SG">{{ __('countries.SG') }}</option>
                        <option value="SX">{{ __('countries.SX') }}</option>
                        <option value="SK">{{ __('countries.SK') }}</option>
                        <option value="SI">{{ __('countries.SI') }}</option>
                        <option value="SB">{{ __('countries.SB') }}</option>
                        <option value="SO">{{ __('countries.SO') }}</option>
                        <option value="ZA">{{ __('countries.ZA') }}</option>
                        <option value="GS">{{ __('countries.GS') }}</option>
                        <option value="SS">{{ __('countries.SS') }}</option>
                        <option value="ES">{{ __('countries.ES') }}</option>
                        <option value="LK">{{ __('countries.LK') }}</option>
                        <option value="SD">{{ __('countries.SD') }}</option>
                        <option value="SR">{{ __('countries.SR') }}</option>
                        <option value="SJ">{{ __('countries.SJ') }}</option>
                        <option value="SZ">{{ __('countries.SZ') }}</option>
                        <option value="SE">{{ __('countries.SE') }}</option>
                        <option value="CH">{{ __('countries.CH') }}</option>
                        <option value="SY">{{ __('countries.SY') }}</option>
                        <option value="TW">{{ __('countries.TW') }}</option>
                        <option value="TJ">{{ __('countries.TJ') }}</option>
                        <option value="TZ">{{ __('countries.TZ') }}</option>
                        <option value="TH">{{ __('countries.TH') }}</option>
                        <option value="TL">{{ __('countries.TL') }}</option>
                        <option value="TG">{{ __('countries.TG') }}</option>
                        <option value="TK">{{ __('countries.TK') }}</option>
                        <option value="TO">{{ __('countries.TO') }}</option>
                        <option value="TT">{{ __('countries.TT') }}</option>
                        <option value="TN">{{ __('countries.TN') }}</option>
                        <option value="TR">{{ __('countries.TR') }}</option>
                        <option value="TM">{{ __('countries.TM') }}</option>
                        <option value="TC">{{ __('countries.TC') }}</option>
                        <option value="TV">{{ __('countries.TV') }}</option>
                        <option value="UG">{{ __('countries.UG') }}</option>
                        <option value="UA">{{ __('countries.UA') }}</option>
                        <option value="AE">{{ __('countries.AE') }}</option>
                        <option value="GB">{{ __('countries.GB') }}</option>
                        <option value="US">{{ __('countries.US') }}</option>
                        <option value="UM">{{ __('countries.UM') }}</option>
                        <option value="UY">{{ __('countries.UY') }}</option>
                        <option value="UZ">{{ __('countries.UZ') }}</option>
                        <option value="VU">{{ __('countries.VU') }}</option>
                        <option value="VE">{{ __('countries.VE') }}</option>
                        <option value="VN">{{ __('countries.VN') }}</option>
                        <option value="VG">{{ __('countries.VG') }}</option>
                        <option value="VI">{{ __('countries.VI') }}</option>
                        <option value="WF">{{ __('countries.WF') }}</option>
                        <option value="EH">{{ __('countries.EH') }}</option>
                        <option value="YE">{{ __('countries.YE') }}</option>
                        <option value="ZM">{{ __('countries.ZM') }}</option>
                        <option value="ZW">{{ __('countries.ZW') }}</option>
                    </select>
                </div>
                <div>
                    <label for="manufacturing_country"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('bomb.enter_manufacturing_country') }}</label>
                    <select id="manufacturing_country" name="manufacturing_country"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        <option disabled selected value>{{ __('bomb.enter_manufacturing_country_placeholder') }}
                        </option>
                        <option value="AF">{{ __('countries.AF') }}</option>
                        <option value="AX">{{ __('countries.AX') }}</option>
                        <option value="AL">{{ __('countries.AL') }}</option>
                        <option value="DZ">{{ __('countries.DZ') }}</option>
                        <option value="AS">{{ __('countries.AS') }}</option>
                        <option value="AD">{{ __('countries.AD') }}</option>
                        <option value="AO">{{ __('countries.AO') }}</option>
                        <option value="AI">{{ __('countries.AI') }}</option>
                        <option value="AQ">{{ __('countries.AQ') }}</option>
                        <option value="AG">{{ __('countries.AG') }}</option>
                        <option value="AR">{{ __('countries.AR') }}</option>
                        <option value="AM">{{ __('countries.AM') }}</option>
                        <option value="AW">{{ __('countries.AW') }}</option>
                        <option value="AU">{{ __('countries.AU') }}</option>
                        <option value="AT">{{ __('countries.AT') }}</option>
                        <option value="AZ">{{ __('countries.AZ') }}</option>
                        <option value="BS">{{ __('countries.BS') }}</option>
                        <option value="BH">{{ __('countries.BH') }}</option>
                        <option value="BD">{{ __('countries.BD') }}</option>
                        <option value="BB">{{ __('countries.BB') }}</option>
                        <option value="BY">{{ __('countries.BY') }}</option>
                        <option value="BE">{{ __('countries.BE') }}</option>
                        <option value="BZ">{{ __('countries.BZ') }}</option>
                        <option value="BJ">{{ __('countries.BJ') }}</option>
                        <option value="BM">{{ __('countries.BM') }}</option>
                        <option value="BT">{{ __('countries.BT') }}</option>
                        <option value="BO">{{ __('countries.BO') }}</option>
                        <option value="BQ">{{ __('countries.BQ') }}</option>
                        <option value="BA">{{ __('countries.BA') }}</option>
                        <option value="BW">{{ __('countries.BW') }}</option>
                        <option value="BV">{{ __('countries.BV') }}</option>
                        <option value="BR">{{ __('countries.BR') }}</option>
                        <option value="IO">{{ __('countries.IO') }}</option>
                        <option value="BN">{{ __('countries.BN') }}</option>
                        <option value="BG">{{ __('countries.BG') }}</option>
                        <option value="BF">{{ __('countries.BF') }}</option>
                        <option value="BI">{{ __('countries.BI') }}</option>
                        <option value="KH">{{ __('countries.KH') }}</option>
                        <option value="CM">{{ __('countries.CM') }}</option>
                        <option value="CA">{{ __('countries.CA') }}</option>
                        <option value="CV">{{ __('countries.CV') }}</option>
                        <option value="KY">{{ __('countries.KY') }}</option>
                        <option value="CF">{{ __('countries.CF') }}</option>
                        <option value="TD">{{ __('countries.TD') }}</option>
                        <option value="CL">{{ __('countries.CL') }}</option>
                        <option value="CN">{{ __('countries.CN') }}</option>
                        <option value="CX">{{ __('countries.CX') }}</option>
                        <option value="CC">{{ __('countries.CC') }}</option>
                        <option value="CO">{{ __('countries.CO') }}</option>
                        <option value="KM">{{ __('countries.KM') }}</option>
                        <option value="CG">{{ __('countries.CG') }}</option>
                        <option value="CD">{{ __('countries.CD') }}</option>
                        <option value="CK">{{ __('countries.CK') }}</option>
                        <option value="CR">{{ __('countries.CR') }}</option>
                        <option value="CI">{{ __('countries.CI') }}</option>
                        <option value="HR">{{ __('countries.HR') }}</option>
                        <option value="CU">{{ __('countries.CU') }}</option>
                        <option value="CW">{{ __('countries.CW') }}</option>
                        <option value="CY">{{ __('countries.CY') }}</option>
                        <option value="CZ">{{ __('countries.CZ') }}</option>
                        <option value="DK">{{ __('countries.DK') }}</option>
                        <option value="DJ">{{ __('countries.DJ') }}</option>
                        <option value="DM">{{ __('countries.DM') }}</option>
                        <option value="DO">{{ __('countries.DO') }}</option>
                        <option value="EC">{{ __('countries.EC') }}</option>
                        <option value="EG">{{ __('countries.EG') }}</option>
                        <option value="SV">{{ __('countries.SV') }}</option>
                        <option value="GQ">{{ __('countries.GQ') }}</option>
                        <option value="ER">{{ __('countries.ER') }}</option>
                        <option value="EE">{{ __('countries.EE') }}</option>
                        <option value="ET">{{ __('countries.ET') }}</option>
                        <option value="FK">{{ __('countries.FK') }}</option>
                        <option value="FO">{{ __('countries.FO') }}</option>
                        <option value="FJ">{{ __('countries.FJ') }}</option>
                        <option value="FI">{{ __('countries.FI') }}</option>
                        <option value="FR">{{ __('countries.FR') }}</option>
                        <option value="GF">{{ __('countries.GF') }}</option>
                        <option value="PF">{{ __('countries.PF') }}</option>
                        <option value="TF">{{ __('countries.TF') }}</option>
                        <option value="GA">{{ __('countries.GA') }}</option>
                        <option value="GM">{{ __('countries.GM') }}</option>
                        <option value="GE">{{ __('countries.GE') }}</option>
                        <option value="DE">{{ __('countries.DE') }}</option>
                        <option value="GH">{{ __('countries.GH') }}</option>
                        <option value="GI">{{ __('countries.GI') }}</option>
                        <option value="GR">{{ __('countries.GR') }}</option>
                        <option value="GL">{{ __('countries.GL') }}</option>
                        <option value="GD">{{ __('countries.GD') }}</option>
                        <option value="GP">{{ __('countries.GP') }}</option>
                        <option value="GU">{{ __('countries.GU') }}</option>
                        <option value="GT">{{ __('countries.GT') }}</option>
                        <option value="GG">{{ __('countries.GG') }}</option>
                        <option value="GN">{{ __('countries.GN') }}</option>
                        <option value="GW">{{ __('countries.GW') }}</option>
                        <option value="GY">{{ __('countries.GY') }}</option>
                        <option value="HT">{{ __('countries.HT') }}</option>
                        <option value="HM">{{ __('countries.HM') }}</option>
                        <option value="VA">{{ __('countries.VA') }}</option>
                        <option value="HN">{{ __('countries.HN') }}</option>
                        <option value="HK">{{ __('countries.HK') }}</option>
                        <option value="HU">{{ __('countries.HU') }}</option>
                        <option value="IS">{{ __('countries.IS') }}</option>
                        <option value="IN">{{ __('countries.IN') }}</option>
                        <option value="ID">{{ __('countries.ID') }}</option>
                        <option value="IR">{{ __('countries.IR') }}</option>
                        <option value="IQ">{{ __('countries.IQ') }}</option>
                        <option value="IE">{{ __('countries.IE') }}</option>
                        <option value="IM">{{ __('countries.IM') }}</option>
                        <option value="IL">{{ __('countries.IL') }}</option>
                        <option value="IT">{{ __('countries.IT') }}</option>
                        <option value="JM">{{ __('countries.JM') }}</option>
                        <option value="JP">{{ __('countries.JP') }}</option>
                        <option value="JE">{{ __('countries.JE') }}</option>
                        <option value="JO">{{ __('countries.JO') }}</option>
                        <option value="KZ">{{ __('countries.KZ') }}</option>
                        <option value="KE">{{ __('countries.KE') }}</option>
                        <option value="KI">{{ __('countries.KI') }}</option>
                        <option value="KP">{{ __('countries.KP') }}</option>
                        <option value="KR">{{ __('countries.KR') }}</option>
                        <option value="XK">{{ __('countries.XK') }}</option>
                        <option value="KW">{{ __('countries.KW') }}</option>
                        <option value="KG">{{ __('countries.KG') }}</option>
                        <option value="LA">{{ __('countries.LA') }}</option>
                        <option value="LV">{{ __('countries.LV') }}</option>
                        <option value="LB">{{ __('countries.LB') }}</option>
                        <option value="LS">{{ __('countries.LS') }}</option>
                        <option value="LR">{{ __('countries.LR') }}</option>
                        <option value="LY">{{ __('countries.LY') }}</option>
                        <option value="LI">{{ __('countries.LI') }}</option>
                        <option value="LT">{{ __('countries.LT') }}</option>
                        <option value="LU">{{ __('countries.LU') }}</option>
                        <option value="MO">{{ __('countries.MO') }}</option>
                        <option value="MK">{{ __('countries.MK') }}</option>
                        <option value="MG">{{ __('countries.MG') }}</option>
                        <option value="MW">{{ __('countries.MW') }}</option>
                        <option value="MY">{{ __('countries.MY') }}</option>
                        <option value="MV">{{ __('countries.MV') }}</option>
                        <option value="ML">{{ __('countries.ML') }}</option>
                        <option value="MT">{{ __('countries.MT') }}</option>
                        <option value="MH">{{ __('countries.MH') }}</option>
                        <option value="MQ">{{ __('countries.MQ') }}</option>
                        <option value="MR">{{ __('countries.MR') }}</option>
                        <option value="MU">{{ __('countries.MU') }}</option>
                        <option value="YT">{{ __('countries.YT') }}</option>
                        <option value="MX">{{ __('countries.MX') }}</option>
                        <option value="FM">{{ __('countries.FM') }}</option>
                        <option value="MD">{{ __('countries.MD') }}</option>
                        <option value="MC">{{ __('countries.MC') }}</option>
                        <option value="MN">{{ __('countries.MN') }}</option>
                        <option value="ME">{{ __('countries.ME') }}</option>
                        <option value="MS">{{ __('countries.MS') }}</option>
                        <option value="MA">{{ __('countries.MA') }}</option>
                        <option value="MZ">{{ __('countries.MZ') }}</option>
                        <option value="MM">{{ __('countries.MM') }}</option>
                        <option value="NA">{{ __('countries.NA') }}</option>
                        <option value="NR">{{ __('countries.NR') }}</option>
                        <option value="NP">{{ __('countries.NP') }}</option>
                        <option value="NL">{{ __('countries.NL') }}</option>
                        <option value="AN">{{ __('countries.AN') }}</option>
                        <option value="NC">{{ __('countries.NC') }}</option>
                        <option value="NZ">{{ __('countries.NZ') }}</option>
                        <option value="NI">{{ __('countries.NI') }}</option>
                        <option value="NE">{{ __('countries.NE') }}</option>
                        <option value="NG">{{ __('countries.NG') }}</option>
                        <option value="NU">{{ __('countries.NU') }}</option>
                        <option value="NF">{{ __('countries.NF') }}</option>
                        <option value="MP">{{ __('countries.MP') }}</option>
                        <option value="NO">{{ __('countries.NO') }}</option>
                        <option value="OM">{{ __('countries.OM') }}</option>
                        <option value="PK">{{ __('countries.PK') }}</option>
                        <option value="PW">{{ __('countries.PW') }}</option>
                        <option value="PS">{{ __('countries.PS') }}</option>
                        <option value="PA">{{ __('countries.PA') }}</option>
                        <option value="PG">{{ __('countries.PG') }}</option>
                        <option value="PY">{{ __('countries.PY') }}</option>
                        <option value="PE">{{ __('countries.PE') }}</option>
                        <option value="PH">{{ __('countries.PH') }}</option>
                        <option value="PN">{{ __('countries.PN') }}</option>
                        <option value="PL">{{ __('countries.PL') }}</option>
                        <option value="PT">{{ __('countries.PT') }}</option>
                        <option value="PR">{{ __('countries.PR') }}</option>
                        <option value="QA">{{ __('countries.QA') }}</option>
                        <option value="RE">{{ __('countries.RE') }}</option>
                        <option value="RO">{{ __('countries.RO') }}</option>
                        <option value="RU">{{ __('countries.RU') }}</option>
                        <option value="RW">{{ __('countries.RW') }}</option>
                        <option value="BL">{{ __('countries.BL') }}</option>
                        <option value="SH">{{ __('countries.SH') }}</option>
                        <option value="KN">{{ __('countries.KN') }}</option>
                        <option value="LC">{{ __('countries.LC') }}</option>
                        <option value="MF">{{ __('countries.MF') }}</option>
                        <option value="PM">{{ __('countries.PM') }}</option>
                        <option value="VC">{{ __('countries.VC') }}</option>
                        <option value="WS">{{ __('countries.WS') }}</option>
                        <option value="SM">{{ __('countries.SM') }}</option>
                        <option value="ST">{{ __('countries.ST') }}</option>
                        <option value="SA">{{ __('countries.SA') }}</option>
                        <option value="SN">{{ __('countries.SN') }}</option>
                        <option value="RS">{{ __('countries.RS') }}</option>
                        <option value="CS">{{ __('countries.CS') }}</option>
                        <option value="SC">{{ __('countries.SC') }}</option>
                        <option value="SL">{{ __('countries.SL') }}</option>
                        <option value="SG">{{ __('countries.SG') }}</option>
                        <option value="SX">{{ __('countries.SX') }}</option>
                        <option value="SK">{{ __('countries.SK') }}</option>
                        <option value="SI">{{ __('countries.SI') }}</option>
                        <option value="SB">{{ __('countries.SB') }}</option>
                        <option value="SO">{{ __('countries.SO') }}</option>
                        <option value="ZA">{{ __('countries.ZA') }}</option>
                        <option value="GS">{{ __('countries.GS') }}</option>
                        <option value="SS">{{ __('countries.SS') }}</option>
                        <option value="ES">{{ __('countries.ES') }}</option>
                        <option value="LK">{{ __('countries.LK') }}</option>
                        <option value="SD">{{ __('countries.SD') }}</option>
                        <option value="SR">{{ __('countries.SR') }}</option>
                        <option value="SJ">{{ __('countries.SJ') }}</option>
                        <option value="SZ">{{ __('countries.SZ') }}</option>
                        <option value="SE">{{ __('countries.SE') }}</option>
                        <option value="CH">{{ __('countries.CH') }}</option>
                        <option value="SY">{{ __('countries.SY') }}</option>
                        <option value="TW">{{ __('countries.TW') }}</option>
                        <option value="TJ">{{ __('countries.TJ') }}</option>
                        <option value="TZ">{{ __('countries.TZ') }}</option>
                        <option value="TH">{{ __('countries.TH') }}</option>
                        <option value="TL">{{ __('countries.TL') }}</option>
                        <option value="TG">{{ __('countries.TG') }}</option>
                        <option value="TK">{{ __('countries.TK') }}</option>
                        <option value="TO">{{ __('countries.TO') }}</option>
                        <option value="TT">{{ __('countries.TT') }}</option>
                        <option value="TN">{{ __('countries.TN') }}</option>
                        <option value="TR">{{ __('countries.TR') }}</option>
                        <option value="TM">{{ __('countries.TM') }}</option>
                        <option value="TC">{{ __('countries.TC') }}</option>
                        <option value="TV">{{ __('countries.TV') }}</option>
                        <option value="UG">{{ __('countries.UG') }}</option>
                        <option value="UA">{{ __('countries.UA') }}</option>
                        <option value="AE">{{ __('countries.AE') }}</option>
                        <option value="GB">{{ __('countries.GB') }}</option>
                        <option value="US">{{ __('countries.US') }}</option>
                        <option value="UM">{{ __('countries.UM') }}</option>
                        <option value="UY">{{ __('countries.UY') }}</option>
                        <option value="UZ">{{ __('countries.UZ') }}</option>
                        <option value="VU">{{ __('countries.VU') }}</option>
                        <option value="VE">{{ __('countries.VE') }}</option>
                        <option value="VN">{{ __('countries.VN') }}</option>
                        <option value="VG">{{ __('countries.VG') }}</option>
                        <option value="VI">{{ __('countries.VI') }}</option>
                        <option value="WF">{{ __('countries.WF') }}</option>
                        <option value="EH">{{ __('countries.EH') }}</option>
                        <option value="YE">{{ __('countries.YE') }}</option>
                        <option value="ZM">{{ __('countries.ZM') }}</option>
                        <option value="ZW">{{ __('countries.ZW') }}</option>
                    </select>
                </div>
                <div>
                    <label for="stock"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('bomb.enter_stock') }}</label>
                    <input type="number" name="stock" id="stock"
                        placeholder="{{ __('bomb.enter_stock_placeholder') }}" value="{{ old('stock') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                </div>


                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="image">{{ __('bomb.enter_image') }}</label>
                    <input type="file" name="image" id="image" accept=".jpg,.jpeg,.bmp,.png,.gif"
                        class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                </div>


                <div>
                    <label for="destruction_power"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('bomb.enter_destruction_power') }}</label>
                    <input type="number" name="destruction_power" id="destruction_power"
                        placeholder="{{ __('bomb.enter_destruction_power_placeholder') }}"
                        value="{{ old('destruction_power') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                </div>

                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    {{ __('bomb.create_bomb') }}</button>
            </form>
        </div>
    </div>
@endsection

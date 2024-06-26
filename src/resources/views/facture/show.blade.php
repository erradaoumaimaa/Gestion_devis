@include('master.header')

<section class="h-[100vh] w-[100vw] bg-blue-900 flex">
    <section class="mx-auto flex h-full w-[100%] flex-col items-center justify-between bg-white py-10">
        <div class="flex w-full flex-col items-center justify-start gap-4">
            <div class="flex w-full justify-start px-32">
                <div class="flex flex-col items-center justify-start gap-8 p-4">
                    <img class="w-52" src="https://i.ibb.co/pf1gH4f/logo.png" alt="" />
                </div>
                <div class="flex flex-col items-end justify-between gap-8 border-l-4 border-gray-300">
                    <div class="flex h-full flex-col justify-start text-md pl-4">
                        <p class="text-xl font-bold">Smart Soluce</p>
                        <p>Rue 319 N 20 Riad Salam, AGADIR, 80000</p>
                        <p><span class="font-bold">Phone: </span>0661701482</p>
                        <p><span class="font-bold">Email: </span>contact@smartsoluce.com</p>
                        <div class="flex items-center gap-8">
                            <p><span class="font-bold">Ice : </span>002669970000046</p>
                            <p><span class="font-bold">Rc : </span>45365</p>
                            <p><span class="font-bold">If : </span>47329778</p>
                        </div>
                    </div>
                    {{-- <div
                        class="bg-[#000E9C] bg-opacity-30 text-end p-4 px-8 border-2 border-gray-700 flex flex-col items-start gap-4">
                        <div class="text-2xl font-bold w-64 flex items-end justify-between">
                            <p class="text-4xl">Facture N°:<span class="font-normal"> {{ $facture->id }}</span></p>
                        </div>
                        <div class="text-xl font-bold w-32 flex items-end justify-between gap-2">
                            <p class="">Date:</p>
                            <p class="font-normal">{{ $facture->created_at }}</p>
                        </div>
                    </div>
                    <div class="text-end text-sm">
                        <p class="font-bold">{{ $facture->devis->user->name }}</p>
                        <p>{{ $facture->devis->user->ville }}</p>
                        <p>{{ $facture->devis->user->email }}</p>
                    </div> --}}
                </div>
            </div>

            <div class="w-full px-12">
                <hr class="w-full rounded border-[1px] border-gray-100" />
            </div>

            <div class="w-full px-12 grid grid-cols-3 gap-6">
                <h1 class="col-span-3 text-2xl font-black text-center">Facture</h1>
                @php
                    $offset = 5 - ($facture->id !== 0 ? floor(log10($facture->id)) : 1);
                    $id = $offset >= 0 ? str_pad($facture->id, $offset, '0', STR_PAD_LEFT) : $facture->id;
                @endphp
                <p class="text-start"><span class="font-bold text-neutral-700">Facture N °: </span>{{ $id }}
                </p>
                <p class="text-center"><span class="font-bold text-neutral-700">Référence: </span>{{ 'EST-' . $id }}
                </p>
                <p class="text-end"><span class="font-bold text-neutral-700">Date: </span>{{ $facture->created_at }}
                </p>
            </div>

            <div class="w-full px-12">
                <hr class="w-full rounded border-[1px] border-gray-100" />
            </div>

            <div class="w-full px-12 gap-6">
                <h1 class="col-span-3 text-xl font-black text-start">Bill to</h1>
                <div class="mt-4 grid grid-cols-2 gap-4 text-start text-md">
                    <p class="font-bold text-gray-700">{{ $facture->devis->user->name }}</p>
                    <p><span class="font-bold text-gray-700">ICE: </span>{{ $facture->devis->user->ice }}</p>
                </div>
            </div>

            <div class="w-full px-12">
                <hr class="w-full rounded border-[1px] border-gray-100" />
            </div>

            <div class="w-full px-12">
                <table class="w-full border-collapse">
                    <thead class="bg-black">
                        <tr class="text-sm font-black text-gray-900">
                            <th class="bg-black border-2 border-gray-700 p-2 text-center">N°</th>
                            <th class="w-[40%] border-2 border-gray-700 p-2 text-center">SERVICE</th>
                            <th class="border-2 border-gray-700 p-2 text-center">QUANTITE</th>
                            <th class="border-2 border-gray-700 p-2 text-center">PRIX UNITAIRE HT</th>
                            <th class="border-2 border-gray-700 p-2 text-center">MONTANT HT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_ht = 0;
                            $total_tva = 0;
                            $total_ttc = 0;
                            $total_reduction = 0;
                        @endphp
                        @foreach ($facture->devis->services as $index => $service)
                            @php
                                $reduction = $service->price * ($facture->devis->reduction / 100);
                                $ht = $service->price - $reduction;
                                $tva = $ht * ($facture->devis->tva / 100);
                                $ttc = $ht + $tva;
                                $total_ht += $ht;
                                $total_tva += $tva;
                                $total_ttc += $ttc;
                                $total_reduction += $reduction;
                            @endphp
                            <tr class="border-b-[1px] border-gray-100 text-sm">
                                <td class="text-xs border-2 border-gray-700 px-1 py-2 text-center align-center">
                                    {{ $index + 1 }}
                                </td>
                                <td class="text-xs border-2 border-gray-700 px-1 py-2">
                                    <div>
                                        <p>{{ $service->name }}</p>
                                        <p class="text-[8px] text-gray-700">{{ $service->description }}</p>
                                    </div>
                                </td>
                                <td class="text-xs border-2 border-gray-700 px-1 py-2 align-center">
                                    <div>
                                        <p>1</p>
                                        <p class="text-[8px] text-gray-700">Unite(e)</p>
                                    </div>
                                </td>
                                <td class="text-xs border-2 border-gray-700 px-1 py-2 text-end align-center">
                                    {{ $service->price }} MAD</td>
                                <td class="text-xs border-2 border-gray-700 px-1 py-2 text-end align-center">
                                    {{ $ht }} MAD</td>
                            </tr>
                        @endforeach
                        <tr class="font-bold">
                            <td colspan="4"
                                class="text-xs border-2 border-gray-700 px-1 py-2 text-start align-center">
                                Total HT</td>
                            <td class="text-xs border-2 border-gray-700 px-2 py-4 text-start align-center">
                                {{ $total_ht }} MAD</td>
                        </tr>
                        <tr class="font-bold">
                            <td colspan="4"
                                class="text-xs border-2 border-gray-700 px-1 py-2 text-start align-center">Total TVA
                                <span>({{ $facture->devis->tva }}%)</span>
                            </td>
                            <td class="text-xs border-2 border-gray-700 px-2 py-4 text-start align-center">
                                {{ $total_tva }} MAD</td>
                        </tr>
                        <tr class="font-bold">
                            <td colspan="4"
                                class="text-xs border-2 border-gray-700 px-1 py-2 text-start align-center">Reduction
                                <span>({{ $facture->devis->reduction }}%)</span>
                            </td>
                            <td class="text-xs border-2 border-gray-700 px-2 py-4 text-start align-center">
                                {{ $total_reduction }} MAD</td>
                        </tr>
                        <tr class="font-bold">
                            <td colspan="4"
                                class="text-xs border-2 border-gray-700 px-1 py-2 text-start align-center">Total TTC
                            </td>
                            <td class="text-xs border-2 border-gray-700 px-2 py-4 text-start align-center">
                                {{ $total_ttc }} MAD</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-4 flex w-full flex-col items-start justify-start gap-2 px-12 text-sm">
                <p class="font-bold text-neutral-700">Note de facture</p>
                <p>Arrêté le présent facture à la somme de :Quatre mille sept cent soixante-seize Dirhams TTC</p>
                <p><span class="font-bold text-neutral-700">Délai prévisionnel de réalisation : </span>Livraison (mise
                    en production du site) sous 2 semaines à compter
                    de la réception du devis dûment
                    accepté,</p>
                <p><span class="font-bold text-neutral-700">Acompte : </span>50% à la commande</p>
            </div>

            @if ($facture->devis->status == 'approved')
                <div class="mt-10 flex w-full flex-col items-end justify-start gap-2 px-12">
                    <img class="w-[30%]" src="https://i.ibb.co/PrcR3Pp/stamp.png" alt="" srcset="">
                </div>
            @endif
        </div>

        <div
            class="mt-64 flex w-full flex-col items-start justify-between px-12 text-sm pt-4 border-t-2 border-neutral-300">
            <h1 class="text-lg font-bold text-center mx-auto">SMART SOLUCE SARL</h1>
            <div class="mt-2 w-full flex items-center justify-center gap-8">
                <p><span class="font-bold">RIB : </span>007 010 0007278000000208</p>
                <p><span class="font-bold">Ice : </span>002669970000046</p>
                <p><span class="font-bold">Rc : </span>45365</p>
                <p><span class="font-bold">If : </span>47329778</p>
                <p><span class="font-bold">Fixe : </span>0808572896</p>
                <p><span class="font-bold">Gsm : </span>0661701482</p>
            </div>
        </div>
    </section>
</section>

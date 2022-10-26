<?php

namespace Database\Seeders;

use App\Models\Ad;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ads = array(
            [
                'id' => 1,
                'user_id' => 2,
                'title' => '29QR EAT ALL YOU CAN',
                'slug' => Str::slug('29QR EAT ALL YOU CAN'),
                'content' => "
                <div class='m8h3af8h l7ghb35v kjdc1dyq kmwttqpk gh25dzvf n3t5jt4f'>
                <div dir='auto'>MAS PINAHABANG CHIBUGAN TIME!!</div>
                <div dir='auto'>29QR EAT ALL YOU CAN</div>
                <div dir='auto'>we are open 6am BREAKFAST, LUNCH upto Dinner till 1AM!!! Para sa mga ngrerequest eto na!!! Spoiled tlga kayo Kay CHIBUGAN,,,</div>
                <div dir='auto'><span class='fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg'><img src='https://static.xx.fbcdn.net/images/emoji.php/v9/t34/1/16/23f0.png' alt='⏰' width='16' height='16'></span>6AM-1AM EVERYDAY AFFORDABLE BUFFET</div>
                <div dir='auto'>EXCEPT SUNDAY We are open 12nn till 12mn...</div>
                <div dir='auto'>Ano pa hinihintay mo ARAT NA!!!</div>
                </div>
                <div class='l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f'>
                <div dir='auto'>EAT ALL YOU CAN 29QR</div>
                <div dir='auto'>CHIBUGAN NA!!! ARAT NA KABAYAN sa halagang 29qr solve kna CHIBOG TO D'MAX kna!!! Ano na hinihintay mo kabayan!!! Reserve your table now!! Hwag Magpahuli!!! <span class='fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg'><img src='https://static.xx.fbcdn.net/images/emoji.php/v9/t7b/1/16/1f44c.png' alt='👌' width='16' height='16'></span><span class='fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg'><img src='https://static.xx.fbcdn.net/images/emoji.php/v9/t7b/1/16/1f44c.png' alt='👌' width='16' height='16'></span><span class='fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg'><img src='https://static.xx.fbcdn.net/images/emoji.php/v9/t7b/1/16/1f44c.png' alt='👌' width='16' height='16'></span> Sa 29 mo meron kna! Unlimited food trip! Pinoy appetizer, ulam at kanin, street food, at dessert! !! San kpa?? Sulit na sulit mura mura abot Kaya Para sa masa mga kabayan sa doha qatar <span class='fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg'><img src='https://static.xx.fbcdn.net/images/emoji.php/v9/t87/1/16/1f1f6_1f1e6.png' alt='🇶🇦' width='16' height='16'></span><span class='fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg'><img src='https://static.xx.fbcdn.net/images/emoji.php/v9/t87/1/16/1f1f6_1f1e6.png' alt='🇶🇦' width='16' height='16'></span><span class='fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg'><img src='https://static.xx.fbcdn.net/images/emoji.php/v9/tf4/1/16/1f1f5_1f1ed.png' alt='🇵🇭' width='16' height='16'></span><span class='fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg'><img src='https://static.xx.fbcdn.net/images/emoji.php/v9/tf4/1/16/1f1f5_1f1ed.png' alt='🇵🇭' width='16' height='16'></span><span class='fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg'><img src='https://static.xx.fbcdn.net/images/emoji.php/v9/tf4/1/16/1f1f5_1f1ed.png' alt='🇵🇭' width='16' height='16'></span># lasap sarap # ulit sulit # CHIBOG TO D'MAX!!!</div>
                <div dir='auto'>Taste the real FILIPINO AUTHENTIC FOOD here @ CHIBUGAN FOOD HOUSE RESTAURANT</div>
                <div dir='auto'>ARAT NA!!!</div>
                <div dir='auto'>contact us<span class='fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg'><img src='https://static.xx.fbcdn.net/images/emoji.php/v9/t4f/1/16/1f447.png' alt='👇' width='16' height='16'></span><span class='fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg'><img src='https://static.xx.fbcdn.net/images/emoji.php/v9/t4f/1/16/1f447.png' alt='👇' width='16' height='16'></span><span class='fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg'><img src='https://static.xx.fbcdn.net/images/emoji.php/v9/t4f/1/16/1f447.png' alt='👇' width='16' height='16'></span></div>
                <div dir='auto'><span class='fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg'><img src='https://static.xx.fbcdn.net/images/emoji.php/v9/t57/1/16/1f4f1.png' alt='📱' width='16' height='16'></span><a class='qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd ezidihy3' tabindex='0' role='link' href='https://wa.me/97466512324?fbclid=IwAR3ANQ9ekXoK115_q8ZLwzT8fse9NPnGNIVrc5kWEzWV54rn4Q5bpVb0PmM' target='_blank' rel='nofollow noopener'>https://wa.me/97466512324</a></div>
                <div dir='auto'>EXTENDED TIME PARA SAINYO!!</div>
                <div dir='auto'>We are located old salata near Sana signal EXACTLY beside IMPERIAL SUITES HOTEL zone 17 street 970 Bldg 9</div>
                </div>
                <div class='l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f'>
                <div dir='auto'>Search CHIBUGAN FOOD HOUSE RESTAURANT via Uber / waze!!! Thanks everyone God bless</div>
                </div>
                ",
                'link' => "https://www.facebook.com/groups/pinoyadsqatarfilhub/permalink/5113174215471416/",
                'date_start' => now(),
                'date_end' => now()->addDays(3),
                'day_count' => 3,
                'is_expired' => false,
                'created_at' => now(), 
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'title' => 'Complete your ultimate student starter pack with HP, Canon, or Epson Printers. Now on sale! ',
                'slug' => Str::slug('Complete your ultimate student starter pack with HP, Canon, or Epson Printers. Now on sale! '),
                'content' => '
                <div class="m8h3af8h l7ghb35v kjdc1dyq kmwttqpk gh25dzvf n3t5jt4f">
                <div dir="auto">
                <div dir="auto">
                <div class="m8h3af8h l7ghb35v kjdc1dyq kmwttqpk gh25dzvf n3t5jt4f">
                <div dir="auto">Complete your ultimate student starter pack with HP, Canon, or Epson Printers. Now on sale!</div>
                </div>
                <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                <div dir="auto">Available in all PCWORX outlets nationwide.</div>
                </div>
                <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                <div dir="auto">𝗙𝗼𝗿 𝗼𝗿𝗱𝗲𝗿𝘀 𝗮𝗻𝗱 𝗶𝗻𝗾𝘂𝗶𝗿𝗶𝗲𝘀, message us at:</div>
                <div dir="auto">𝗙𝗔𝗖𝗘𝗕𝗢𝗢𝗞: <a class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd ezidihy3" tabindex="0" role="link" href="https://m.me/PCWORX?fbclid=IwAR0uv_-exF5rnfm58iLtcBHQ1hRoyDsTn1JPQQ1gYRNXAx1hJ4CINZFWVJw" target="_blank" rel="nofollow noopener">m.me/PCWORX</a></div>
                <div dir="auto">𝗣𝗖𝗪𝗢𝗥𝗫 𝗢𝗻𝗹𝗶𝗻𝗲 𝗠𝗮𝗿𝗸𝗲𝘁𝗽𝗹𝗮𝗰𝗲: <a class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd ezidihy3" tabindex="0" role="link" href="https://bit.ly/PCWORXViberMarketplace?fbclid=IwAR1A7_8HohcWpibwJV_0S_7TBhdxeA7lRfenW59G0CvXGlndyZ_vRjnwp1Y" target="_blank" rel="nofollow noopener">https://bit.ly/PCWORXViberMarketplace</a></div>
                <div dir="auto">𝗣𝗖𝗪𝗢𝗥𝗫 𝗪𝗲𝗯𝘀𝗶𝘁𝗲: <a class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd ezidihy3" tabindex="0" role="link" href="https://www.pcworx.ph/?fbclid=IwAR2DdPMYSEJa_cwCEXsqHyvLAnTFtNcs1LRorx2UoVboTSqvhu-NSf3eOpY" target="_blank" rel="nofollow noopener">https://www.pcworx.ph/</a></div>
                </div>
                <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                <div dir="auto"><a class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd d1w2l3lo tes86rjd" tabindex="0" role="link" href="https://www.facebook.com/hashtag/pcworx?__eep__=6&amp;__cft__[0]=AZXRVa6QDJME2EYMWjtwiNJYsjwMUOTCkimH4OSHMz2cziwen4iOGwZ4tLlX5riZAyczoQVEMW2RKzGcfkqJigUBFjJqKpzs_ldXqiu61YUtiA8-2ixCd3DVXPXlwGKfAF7yNJRCQJInvZA3IZv5vFceS-lEcqLKkSjkMUfEr7yzJExVVWqMjqETwBzm8xk1Gyc&amp;__tn__=*NK-R">#PCWORX</a> <a class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd d1w2l3lo tes86rjd" tabindex="0" role="link" href="https://www.facebook.com/hashtag/hp?__eep__=6&amp;__cft__[0]=AZXRVa6QDJME2EYMWjtwiNJYsjwMUOTCkimH4OSHMz2cziwen4iOGwZ4tLlX5riZAyczoQVEMW2RKzGcfkqJigUBFjJqKpzs_ldXqiu61YUtiA8-2ixCd3DVXPXlwGKfAF7yNJRCQJInvZA3IZv5vFceS-lEcqLKkSjkMUfEr7yzJExVVWqMjqETwBzm8xk1Gyc&amp;__tn__=*NK-R">#HP</a> <a class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd d1w2l3lo tes86rjd" tabindex="0" role="link" href="https://www.facebook.com/hashtag/epson?__eep__=6&amp;__cft__[0]=AZXRVa6QDJME2EYMWjtwiNJYsjwMUOTCkimH4OSHMz2cziwen4iOGwZ4tLlX5riZAyczoQVEMW2RKzGcfkqJigUBFjJqKpzs_ldXqiu61YUtiA8-2ixCd3DVXPXlwGKfAF7yNJRCQJInvZA3IZv5vFceS-lEcqLKkSjkMUfEr7yzJExVVWqMjqETwBzm8xk1Gyc&amp;__tn__=*NK-R">#Epson</a> <a class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd d1w2l3lo tes86rjd" tabindex="0" role="link" href="https://www.facebook.com/hashtag/canon?__eep__=6&amp;__cft__[0]=AZXRVa6QDJME2EYMWjtwiNJYsjwMUOTCkimH4OSHMz2cziwen4iOGwZ4tLlX5riZAyczoQVEMW2RKzGcfkqJigUBFjJqKpzs_ldXqiu61YUtiA8-2ixCd3DVXPXlwGKfAF7yNJRCQJInvZA3IZv5vFceS-lEcqLKkSjkMUfEr7yzJExVVWqMjqETwBzm8xk1Gyc&amp;__tn__=*NK-R">#Canon</a></div>
                </div>
                </div>
                </div>
                </div>
                ',
                'link' => "https://www.facebook.com/PCWORX/photos/pcb.5772173816148472/5772173712815149/",
                'date_start' => now(),
                'date_end' => now()->addDays(3),
                'day_count' => 3,
                'is_expired' => false,
                'created_at' => now(), 
            ],
            [
                'id' => 3,
                'user_id' => 2,
                'title' => 'No credit card? No problem! Get your laptops on installment via billease!',
                'slug' => Str::slug('No credit card? No problem! Get your laptops on installment via billease!'),
                'content' => '
                <div class="m8h3af8h l7ghb35v kjdc1dyq kmwttqpk gh25dzvf n3t5jt4f">
                    <div dir="auto">
                    <div dir="auto">
                    <div class="m8h3af8h l7ghb35v kjdc1dyq kmwttqpk gh25dzvf n3t5jt4f">
                    <div dir="auto">
                    <div dir="auto">No credit card? No problem! Get your laptops on installment via billease!</div>
                    <div dir="auto"><span class="fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg"><img src="https://static.xx.fbcdn.net/images/emoji.php/v9/t33/1/16/2705.png" alt="✅" width="16" height="16"></span>Fast check out via our website: <a class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd ezidihy3" tabindex="0" role="link" href="https://laptopfactory.slefenterprises.com/?fbclid=IwAR1DuXTlgdpUQlO2YSjZxLNg8R4t5z06l1Qy5qgmtUtlATA-oyxNP9rLJEs" target="_blank" rel="nofollow noopener">https://laptopfactory.slefenterprises.com</a></div>
                    <div dir="auto"><span class="fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg"><img src="https://static.xx.fbcdn.net/images/emoji.php/v9/t33/1/16/2705.png" alt="✅" width="16" height="16"></span>available for walk-in clients</div>
                    <div dir="auto"><span class="fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg"><img src="https://static.xx.fbcdn.net/images/emoji.php/v9/t33/1/16/2705.png" alt="✅" width="16" height="16"></span>fast delivery / item release upon approval</div>
                    </div>
                    </div>
                    <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">&nbsp;</div>
                    </div>
                    </div>
                </div>
                ',
                'link' => "https://www.facebook.com/PCWORX/photos/pcb.5772173816148472/5772173712815149/",
                'date_start' => now(),
                'date_end' => now()->addDays(3),
                'day_count' => 3,
                'is_expired' => false,
                'created_at' => now(), 
            ],
        );

        Ad::insert($ads);

        Ad::all()->each(function($ad) 
        {
            
            $payment = $ad->payment()->create([
                        'user_id' => User::find(2)->id,
                        'payment_method_id' => 1,
                        'user_name' => User::find(2)->full_name,
                        'paymentable_name' => $ad->title,
                        'amount' => 150,
                        'transaction_no' => mt_rand(123456,999999),
                        'reference_no' => mt_rand(123456,999999),
                        'status' => Payment::CONFIRMED, // Payment::PENDING // Payment::REJECTED
                    ]);

            activity()
            ->causedBy($payment->user)
            ->performedOn($ad)
            ->withProperties(['ip' => request()->ip()])
            ->log($payment->user->full_name . " has requested an Advertisement - " . $ad->title); // log activity

            $ad->addMedia(public_path("/img/tmp_files/ads/$ad->id.jpg"))->preservingOriginal()->toMediaCollection('ad_images');
            $payment->addMedia(public_path("/img/tmp_files/receipts/gcash.png"))->preservingOriginal()->toMediaCollection('payment_receipts');
        });
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Announcement;
use Illuminate\Database\Seeder;
use App\Services\ActivityLogsService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ActivityLogsService $service)
    {
        $announcements = array(
            [
                'id' => 1,
                'title' => 'CALL FOR DONATIONS for the Pandalivery Team!',
                'slug' => Str::slug('CALL FOR DONATIONS for the Pandalivery Team!'),
                'content' => '
                <div class="m8h3af8h l7ghb35v kjdc1dyq kmwttqpk gh25dzvf n3t5jt4f">
                <div dir="auto">
                <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                <div dir="auto">We call on your generous hearts to help out team members of Pandalivery across Camarines Sur and Albay. This is to support them during these tough times wherein they are unable to cope up and bounce back properly because of the three consecutive typhoons (<a class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd d1w2l3lo tes86rjd" tabindex="0" role="link" href="https://www.facebook.com/hashtag/quintaph?__eep__=6&amp;__cft__[0]=AZWamiN7mECY7WGH3ZWFY0iBZFwd2ygeVQeZmcKtp3xkwQ1-cZQAXgABt77dj2jJUN44ffV__N8Ot1GTvdSvUu4bru4BDkE523O1WlFBgpoG4xo--VyXpDgc1n_hCDGMqNM&amp;__tn__=*NK-R">#QuintaPH</a>, <a class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd d1w2l3lo tes86rjd" tabindex="0" role="link" href="https://www.facebook.com/hashtag/rollyph?__eep__=6&amp;__cft__[0]=AZWamiN7mECY7WGH3ZWFY0iBZFwd2ygeVQeZmcKtp3xkwQ1-cZQAXgABt77dj2jJUN44ffV__N8Ot1GTvdSvUu4bru4BDkE523O1WlFBgpoG4xo--VyXpDgc1n_hCDGMqNM&amp;__tn__=*NK-R">#RollyPH</a>, <a class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd d1w2l3lo tes86rjd" tabindex="0" role="link" href="https://www.facebook.com/hashtag/ulyssesph?__eep__=6&amp;__cft__[0]=AZWamiN7mECY7WGH3ZWFY0iBZFwd2ygeVQeZmcKtp3xkwQ1-cZQAXgABt77dj2jJUN44ffV__N8Ot1GTvdSvUu4bru4BDkE523O1WlFBgpoG4xo--VyXpDgc1n_hCDGMqNM&amp;__tn__=*NK-R">#UlyssesPH</a>) that struck the Bicol Region.</div>
                </div>
                <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                <div dir="auto">Any donation/amount/contribution is appreciated. Please see photos for more details.</div>
                </div>
                <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                <div dir="auto">Yesterday, our team members are reporting that their houses and respective areas are flooded or damaged by Typhoon <a class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd d1w2l3lo tes86rjd" tabindex="0" role="link" href="https://www.facebook.com/hashtag/ulyssesph?__eep__=6&amp;__cft__[0]=AZWamiN7mECY7WGH3ZWFY0iBZFwd2ygeVQeZmcKtp3xkwQ1-cZQAXgABt77dj2jJUN44ffV__N8Ot1GTvdSvUu4bru4BDkE523O1WlFBgpoG4xo--VyXpDgc1n_hCDGMqNM&amp;__tn__=*NK-R">#UlyssesPH</a>, most of which are not yet fixed or stable due to the recent Super Typhoon <a class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd d1w2l3lo tes86rjd" tabindex="0" role="link" href="https://www.facebook.com/hashtag/rollyph?__eep__=6&amp;__cft__[0]=AZWamiN7mECY7WGH3ZWFY0iBZFwd2ygeVQeZmcKtp3xkwQ1-cZQAXgABt77dj2jJUN44ffV__N8Ot1GTvdSvUu4bru4BDkE523O1WlFBgpoG4xo--VyXpDgc1n_hCDGMqNM&amp;__tn__=*NK-R">#RollyPH</a>.</div>
                </div>
                <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                <div dir="auto">Maraming salamat po! Thank you so much! <a class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd d1w2l3lo tes86rjd" tabindex="0" role="link" href="https://www.facebook.com/hashtag/pandalivery?__eep__=6&amp;__cft__[0]=AZWamiN7mECY7WGH3ZWFY0iBZFwd2ygeVQeZmcKtp3xkwQ1-cZQAXgABt77dj2jJUN44ffV__N8Ot1GTvdSvUu4bru4BDkE523O1WlFBgpoG4xo--VyXpDgc1n_hCDGMqNM&amp;__tn__=*NK-R">#Pandalivery</a></div>
                </div>
                <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                <div dir="auto">---</div>
                <div dir="auto">TO DONATE:</div>
                </div>
                <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                <div dir="auto">Bank of the Philippine Islands</div>
                <div dir="auto">Account Name: Jude Salvador Buelva</div>
                <div dir="auto">Account No.: 9549 0035 05</div>
                <div dir="auto">Remarks: "Donation for Pandalivery"</div>
                </div>
                <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                <div dir="auto">GCash via Send Money</div>
                <div dir="auto">Account Name: Jude Salvador Buelva</div>
                <div dir="auto">Phone Number: 0920 948 1081</div>
                <div dir="auto">Remarks/Note: "Donation for Pandalivery"</div>
                </div>
                </div>
                </div>
                ',
                'created_at' => now(), 
            ],
            [
                'id' => 2,
                'title' => 'Donate a BOOK, change a LIFE',
                'slug' => Str::slug('Donate a BOOK, change a LIFE'),
                'content' => '
                <div class="m8h3af8h l7ghb35v kjdc1dyq kmwttqpk gh25dzvf n3t5jt4f">
                    <div dir="auto">Donate a BOOK, change a LIFE. <span class="fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg"><img src="https://static.xx.fbcdn.net/images/emoji.php/v9/t49/1/16/1f4da.png" alt="📚" width="16" height="16"></span><span class="fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg"><img src="https://static.xx.fbcdn.net/images/emoji.php/v9/t98/1/16/1f49e.png" alt="💞" width="16" height="16"></span></div>
                    </div>
                    <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                    <div dir="auto">You may drop-off your books at our Center located @ Comun, Malinao, Albay. We hope to receive your books on or before August 28, 2022. <span class="fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg"><img src="https://static.xx.fbcdn.net/images/emoji.php/v9/tb7/1/16/1f917.png" alt="🤗" width="16" height="16"></span></div>
                    </div>
                    <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                    <div dir="auto">For queries, you may send a text or call our Advocacy Section CP number- 09318840450.</div>
                    </div>
                    <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                    <div dir="auto">Thank you!<span class="fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg"><img src="https://static.xx.fbcdn.net/images/emoji.php/v9/t66/1/16/1f493.png" alt="💓" width="16" height="16"></span></div>
                    <div dir="auto">May the Lord bless your generous hearts!<span class="fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg"><img src="https://static.xx.fbcdn.net/images/emoji.php/v9/t55/1/16/1f607.png" alt="😇" width="16" height="16"></span><span class="fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg"><img src="https://static.xx.fbcdn.net/images/emoji.php/v9/t80/1/16/1f64f.png" alt="🙏" width="16" height="16"></span></div>
                    </div>
                ',
                'created_at' => now(), 
            ],
            [
                'id' => 3,
                'title' => '3 weeks post Typhoon Rolly',
                'slug' => Str::slug('3 weeks post Typhoon Rolly'),
                'content' => '
                <div class="m8h3af8h l7ghb35v kjdc1dyq kmwttqpk gh25dzvf n3t5jt4f">
                    <div dir="auto">
                    <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                    <div dir="auto">
                    <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                    <div dir="auto">We visited Guinobatan, Albay to see the situation of the residents that were affected by the lahar flow during the Super Typhoon Rolly (Goni)</div>
                    </div>
                    <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                    <div dir="auto">Yes, help is pouring (more on foods and clothes) but from what we observed they still need help to start building their houses. So we are knocking to your generous hearts to give assistance to our kababayans.</div>
                    </div>
                    <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                    <div dir="auto">Collected funds will be donated to the residents of Travesia Guinobatan, Albay to help the families start building their lost homes. (We will be purchasing construction materials- plywood, nails, yero, shovel,etc.)</div>
                    </div>
                    <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                    <div dir="auto">Your help will go a long way! <span class="fxk3tzhb b2rh1bv3 gh55jysx m8h3af8h ewco64xe kjdc1dyq ms56khn7 bq6c9xl4 eohcrkr5 akh3l2rg"><img src="https://static.xx.fbcdn.net/images/emoji.php/v9/t66/1/16/1f493.png" alt="💓" width="16" height="16"></span></div>
                    <div dir="auto">Thank you and God bless.</div>
                    </div>
                    <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                    <div dir="auto">Please notify us at 0939-442-6627 so that we can record your donation.</div>
                    </div>
                    <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                    <div dir="auto"><a class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd d1w2l3lo tes86rjd" tabindex="0" role="link" href="https://www.facebook.com/hashtag/bangonuragon?__eep__=6&amp;__cft__[0]=AZWcLNtTPeRCMNQ_pCx5Kwp2BzVd53QpKUCSU6WO_eGO_IA26EO166bol1WmMtfJzpmFq-BrhHeLamDQVJ3FKObckQHtY0kC46YQxI4H9ji2BYm-IA1w3PNxqrCtiaEgwPM&amp;__tn__=*NK-R">#BangonUragon</a></div>
                    <div dir="auto"><a class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd d1w2l3lo tes86rjd" tabindex="0" role="link" href="https://www.facebook.com/hashtag/callfordonations?__eep__=6&amp;__cft__[0]=AZWcLNtTPeRCMNQ_pCx5Kwp2BzVd53QpKUCSU6WO_eGO_IA26EO166bol1WmMtfJzpmFq-BrhHeLamDQVJ3FKObckQHtY0kC46YQxI4H9ji2BYm-IA1w3PNxqrCtiaEgwPM&amp;__tn__=*NK-R">#CallForDonations</a></div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                ',
                'created_at' => now(), 
            ],
        );

        Announcement::insert($announcements);

        foreach(Announcement::all() as $announcement ) {
            $announcement->addMedia(public_path("/img/tmp_files/announcements/$announcement->id.jpg"))->preservingOriginal()->toMediaCollection('announcement_images');
            $service->log_activity(model:$announcement, event:'added', model_name: 'Announcement', model_property_name: $announcement->title, conjunction: 'an'); // seed
        }
    }
}
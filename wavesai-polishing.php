<?php
/*
Plugin Name: WavesAI Polishing
Description: CSS fixes and additional prompts for WavesAI Studio
Version: 1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit;

// ─────────────────────────────────────────────────────────────────────────────
// 1. CSS FIXES
// ─────────────────────────────────────────────────────────────────────────────
add_action( 'wp_footer', 'wavesai_polishing_css', 200 );
function wavesai_polishing_css() {
    ?>
<style id="wavesai-polishing-css">
/* ── Prompt Library category buttons ── */
.pl-cat {
    background: #332628 !important;
    color: #F3E9D0 !important;
    border-color: rgba(243,233,208,0.2) !important;
}
.pl-cat.active {
    background: #F81894 !important;
    border-color: #F81894 !important;
    color: #F3E9D0 !important;
}

/* ── Prompt Library search ── */
.pl-search {
    background: #F3E9D0 !important;
    border-color: rgba(51,38,40,0.2) !important;
    color: #332628 !important;
}

/* ── AI Chat input larger ── */
.aichat-textarea,
#aichat-input {
    min-height: 80px !important;
    font-size: 16px !important;
    padding: 16px 20px !important;
    background: #F3E9D0 !important;
    border: 2px solid rgba(248,24,148,0.25) !important;
    border-radius: 16px !important;
    color: #332628 !important;
}
.aichat-textarea::placeholder {
    color: rgba(51,38,40,0.4) !important;
}
@media (max-width: 768px) {
    .aichat-textarea,
    #aichat-input {
        min-height: 70px !important;
        font-size: 15px !important;
    }
}

/* ── Business Suite card text (fix invisible text on dark brown cards) ── */
[style*="background:#332628"] p,
[style*="background:#332628"] h3,
[style*="background:#332628"] h4,
[style*="background:#332628"] span,
[style*="background:#332628"] li {
    color: #F3E9D0 !important;
}
.bsuite-seo-hero p,
.bsuite-seo-hero h3,
.bsuite-seo-hero span {
    color: #F3E9D0 !important;
}

/* ── Image generator text ── */
.wavesai-tool-container p {
    color: #332628 !important;
}
.wavesai-tool-container .wavesai-label {
    color: #332628 !important;
}
.wavesai-tool-container small {
    color: rgba(51,38,40,0.6) !important;
}

/* ── Video Studio prompt input ── */
#vs-prompt-input {
    background: #F3E9D0 !important;
    border-color: rgba(51,38,40,0.2) !important;
    color: #332628 !important;
}

/* ── My Generations heading visible (brown on cream) ── */
.wavesai-section-title {
    color: #332628 !important;
}

/* ── Hide bug report widget ── */
#wavesai-report-widget {
    display: none !important;
}

/* ── Un-hide Video Studio from mobile menu ── */
@media (max-width: 921px) {
    .ast-mobile-header-content li:has(a[href*="/video-studio/"]) {
        display: block !important;
    }
}

/* ── Force-hide Tools from ALL menus (both Astra + WP pages menus) ── */
li:has(> a[href$="/tools/"]) { display: none !important; }
li:has(> a[href="/tools/"]) { display: none !important; }
li.page_item_has_children:has(> a[href*="/tools/"]) { display: none !important; }
li.menu-item-has-children:has(> a[href*="/tools/"]):not(.sub-menu li) { display: none !important; }

/* ── Hide Product Studio button from Image Generator ── */
#mode-pstudio { display: none !important; }
.wavesai-img-mode-toggle { grid-template-columns: 1fr 1fr !important; }
#wavesai-pstudio-mode { display: none !important; }

/* ── Image Generator tips - darker text ── */
.wavesai-tip {
    color: #332628 !important;
    background: rgba(51,38,40,0.08) !important;
    border-left-color: #F81894 !important;
}
.wavesai-tip strong {
    color: #332628 !important;
}

/* ── Global mobile overflow prevention ── */
@media (max-width: 768px) {
    .wavesai-tool-container {
        max-width: 100vw !important;
        overflow-x: hidden !important;
        box-sizing: border-box !important;
    }
    .wavesai-tool-container * {
        max-width: 100% !important;
        box-sizing: border-box !important;
    }
    .wavesai-tool-container textarea,
    .wavesai-tool-container input,
    .wavesai-tool-container select {
        max-width: 100% !important;
    }

    /* Business Coach 6-card grid: 2 columns on mobile */
    .wavesai-coach-wrap > div[style*="grid-template-columns:repeat(3"] {
        grid-template-columns: repeat(2, 1fr) !important;
    }
    .wavesai-coach-wrap div[style*="repeat(3,1fr)"] {
        grid-template-columns: repeat(2, 1fr) !important;
    }

    /* Quick Actions buttons - prevent text overflow */
    #coach-quick-actions > div {
        gap: 8px !important;
    }
    #coach-quick-actions button {
        font-size: 12px !important;
        padding: 12px 8px !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
        white-space: normal !important;
    }

    /* Video Studio cards - text overflow fix */
    .wavesai-tool-card-v2 p,
    .wavesai-tool-card-v2 .tool-desc {
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
        white-space: normal !important;
    }

    /* Business Coach sessions - more spacing on mobile */
    .coach-card {
        padding: 16px 14px !important;
        margin-bottom: 14px !important;
    }
    #coach-sessions .coach-card,
    .coach-card h3 {
        margin-bottom: 10px !important;
    }
    #coach-sessions button {
        padding: 12px 16px !important;
    }

    /* Coaching Sessions history items - less cramped */
    .coach-card > div[style*="border"] {
        padding: 14px !important;
        margin-bottom: 10px !important;
    }
    .coach-card > div[style*="border"] span {
        display: block !important;
        margin-top: 4px !important;
    }
}
</style>
    <?php
}

// ─────────────────────────────────────────────────────────────────────────────
// 2. HIDE TOOLS FROM MENUS (PHP filter)
// ─────────────────────────────────────────────────────────────────────────────
add_filter( 'wp_nav_menu_items', 'wavesai_hide_tools_menu_item', 999, 2 );
function wavesai_hide_tools_menu_item( $items, $args ) {
    $items = preg_replace(
        '/<li[^>]*class="[^"]*menu-item[^"]*"[^>]*>\s*<a[^>]*>\s*Tools\s*<\/a>.*?<\/li>/si',
        '',
        $items
    );
    return $items;
}

// ─────────────────────────────────────────────────────────────────────────────
// 3. JS MENU CLEANUP
// ─────────────────────────────────────────────────────────────────────────────
add_action( 'wp_footer', 'wavesai_polishing_menu_js', 999 );
function wavesai_polishing_menu_js() {
    ?>
<script id="wavesai-polishing-menu-js">
(function(){
    setTimeout(function(){

        // Hide Tools from ALL menus (both Astra header + WP pages menus)
        document.querySelectorAll('li').forEach(function(li){
            var a = li.querySelector(':scope > a, :scope > .menu-link');
            if(!a) return;
            var text = a.textContent.trim().toLowerCase();
            var href = (a.getAttribute('href') || '').toLowerCase();
            // Hide Tools parent items
            if(text === 'tools' || (href.match(/\/tools\/?$/) && li.querySelector('ul'))) {
                li.style.display = 'none';
            }
        });

        // Deduplicate mobile menu items within each menu separately
        document.querySelectorAll('.ast-mobile-popup-content .main-header-menu, .ast-mobile-header-content .main-header-menu').forEach(function(menu){
            var seen = {};
            menu.querySelectorAll(':scope > li').forEach(function(item){
                var link = item.querySelector(':scope > a, :scope > .menu-link');
                if(!link) return;
                var text = link.textContent.trim().toLowerCase();
                if(seen[text]) {
                    item.style.display = 'none';
                } else {
                    seen[text] = true;
                }
            });
        });

        // Show Blog items that are hidden in menus
        document.querySelectorAll('li').forEach(function(li){
            var a = li.querySelector(':scope > a');
            if(!a) return;
            if(a.textContent.trim().toLowerCase() === 'blog' && window.getComputedStyle(li).display === 'none') {
                // Only show in top-level menus, not submenus
                var parent = li.parentElement;
                if(parent && (parent.classList.contains('sub-menu') || parent.classList.contains('children'))) return;
                li.style.display = '';
            }
        });

        // Remove floating Dashboard button
        var floatingDash = document.getElementById('wavesai-mobile-dash');
        if(floatingDash) floatingDash.remove();

    }, 3000);
})();
</script>
    <?php
}

// ─────────────────────────────────────────────────────────────────────────────
// 4. HORSE & BIRD PROMPTS
// ─────────────────────────────────────────────────────────────────────────────
add_action( 'wp_footer', 'wavesai_polishing_prompts_js', 201 );
function wavesai_polishing_prompts_js() {
    ?>
<script id="wavesai-polishing-prompts-js">
(function(){
    var checkInterval = setInterval(function(){
        if(document.getElementById('pl-grid') && document.querySelectorAll('.pl-card').length > 0) {
            clearInterval(checkInterval);
            var horseAndBirdPrompts = [
                /* ─── HORSES (50) ─── */
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A majestic black Friesian stallion gallops across a misty morning meadow, mane and tail streaming in the wind. Shot on a 400mm telephoto at f/2.8 with golden hour backlight, dust particles catching the warm amber glow. Rich earthy tones, cinematic color grading with deep shadows and luminous highlights. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A wild bay mustang herd thunders across the red-rock canyon landscape of the American Southwest, a cloud of terracotta dust rising around their hooves. Shot on a 500mm prime lens at f/4, capturing motion blur in the tails while faces stay razor-sharp. Punchy, warm desert color grading. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A dapple-grey Andalusian stallion performs a breathtaking levade in a baroque riding arena lit by dramatic side-raking studio lights. Shot on a 200mm lens at f/3.5, the horse\'s muscular form sculpted by chiaroscuro lighting. Monochromatic silver-and-shadow tones with a subtle warm grade. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A chestnut Arabian mare and her golden foal stand at the edge of a sapphire-blue lake at dawn, their reflections perfectly mirrored on the glassy surface. Shot on a 300mm lens at f/5.6, soft diffused morning light wrapping both subjects. Pastel sunrise palette with cool water tones. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A black-and-white Paint horse races through knee-deep ocean surf at sunset, droplets of seawater exploding around its legs like diamonds. Shot on a 600mm telephoto at f/2.8, freezing each droplet mid-air. Vivid coral-and-gold sunset tones contrasted with deep navy water. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A white Lipizzaner stallion leaps in a perfect capriole above an Austrian baroque courtyard, its white coat glowing against a stormy grey sky. Shot at 1/2000s with a 300mm lens at f/4, every sinew visible. Silver-cool color grade with highlights preserved in the horse\'s coat. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A golden Palomino quarter horse stands alone in a vast golden wheat field at magic hour, the sun a brilliant orb low on the horizon. Shot on a 85mm lens at f/1.8, the background dissolving into buttery bokeh. Warm amber and honey color grading throughout. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A pair of dark bay Thoroughbreds race neck-and-neck down a fog-drenched morning track, jockeys crouched low, their breath forming clouds in the cold air. Shot on a 800mm telephoto at f/6.3, head-on perspective compressing the drama. Desaturated grey dawn tones with pops of racing silks color. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A roan Percheron draft horse plows through a snow-covered field in Quebec, its massive feathered hooves kicking up white powder, harness bells glinting in crisp winter sun. Shot on a 200mm lens at f/4, snow crystals sharp as needles. Cool blue-white winter grade with warm breath clouds. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A sleek black Thoroughbred jumps a tall stone wall on a misty Irish countryside morning, hooves tucked perfectly, rider leaning forward. Shot on a 400mm at f/3.5 from a low angle, morning fog creating layers of atmospheric depth. Rich emerald greens, dark stone, and silver mist. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. Three free-roaming Icelandic horses in their thick shaggy winter coats stand together on a volcanic lava plain, steam rising from geothermal vents behind them against a vivid northern sky. Shot on a 24mm wide-angle at f/8 for total sharpness. Epic Icelandic cool palette with magenta aurora hints. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A sorrel foal sleeps curled in deep straw in a rustic wooden stable, amber lantern light playing across its velvet coat. Shot on a 50mm at f/1.4, the shallow depth of field rendering the straw as a golden soft sea. Warm candlelit grade with rich chocolate shadows. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A grey Camargue horse strides through a vast pink flamingo marsh at dusk, its white coat reflected in shallow rose-tinted water. Shot on a 300mm at f/5.6 from water level, giving an immersive wading perspective. Flamingo pink and dusty lilac sunset color grade. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A stallion rears dramatically against a lightning-filled stormy sky on an open prairie, mane whipping in the gale, muscles taut with power. Shot at 1/500s on a 200mm at f/4, backlit by a dramatic lightning strike. Dark and brooding storm palette with electric blue flashes. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A team of six matched black Friesian horses pulls an ornate golden royal carriage through an autumn forest road, leaves swirling in their wake. Shot on a 135mm at f/4, capturing the full procession. Rich autumn reds and golds contrasted with jet-black horses. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A close-up portrait of a dark bay Arabian\'s face, nostrils flared, one intelligent dark eye reflecting the sunset landscape behind the photographer. Shot on a 200mm macro at f/2.8, filling the frame with the horse\'s sculptural head. Warm terracotta and deep mahogany color grade. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A tobiano Paint horse wades chest-deep in a mountain river as autumn aspens shimmer gold all around it, the current swirling in copper eddies. Shot on a 400mm at f/4, from the bank, capturing water detail and leaf color equally. Vivid fall color grade. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A young woman rides a dressage horse in a grand Prix test on a perfectly manicured grass arena, the horse floating in an extended trot. Shot on a 600mm at f/5.6 from ringside, compression creating a tight, graphic composition. Clean bright whites, vivid green turf. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A herd of wild brumbies gallops down a steep Great Dividing Range hillside in Australia, red dust billowing, eucalyptus trees framing the scene. Shot on a drone-mounted 50mm at 150 feet altitude, bird\'s-eye angle. Red ochre and olive green Australian outback palette. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A Gypsy Vanner cob stands in a summer flower meadow in the English Cotswolds, its luxuriant feathering decorated with wildflowers by its young owner. Shot on an 85mm at f/2, lush green bokeh behind. Dreamy pastoral color grade, lavender and meadow gold. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. Two stallions fight in a Mongolian steppe, rearing, biting, and striking as a nomadic ger camp watches in the background against a vast cloudscape. Shot on a 300mm at f/4 from a safe distance, capturing pure animal power. Epic cinematic Mongolian grade, steppe gold and sky blue. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A grey Andalusian in a baroque bridle and embroidered caparison poses regally in a Seville courtyard, orange trees and Moorish architecture framing it. Shot on a 100mm at f/4, symmetrical architectural composition. Warm Andalusian orange and ivory color grade. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A black Morgan stallion stands on a rocky sea cliff at sunrise, ocean crashing below, mane ripped by a salt wind. Shot on a 200mm at f/3.5, backlit by the rising sun creating a luminous rim light. Dark dramatic ocean palette with warm sunrise bloom. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A bay polo pony and its rider lean hard into a sharp turn during a high-goal polo match in Argentina, divots of earth flying, ball a blur below the mallet. Shot on a 800mm at 1/2000s, extreme telephoto compression. Vivid green and earth tones, sun-drenched Argentine summer. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A cream-colored Akhal-Teke horse stands in a desert setting, its metallic sheen coat glowing like liquid gold in direct noon sunlight. Shot on a 135mm at f/3.5, the background dunes soft and warm. Breathtaking gold metallic highlight grade. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A herd of Przewalski\'s horses grazes on a Mongolian steppe under a Milky Way sky so thick with stars it seems unreal, the horses lit only by moonlight and starlight. Shot at ISO 12800 on a 24mm f/1.4 with a 25-second exposure. Dark cool grade with luminous Milky Way arc. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A newborn foal takes its very first steps in a dewy Kentucky Bluegrass paddock at dawn, spindly legs shaking with effort, mother watching close. Shot on a 300mm at f/4, soft golden-hour side light. Misty green-and-gold Kentucky morning palette. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A bay event horse clears a massive water complex at Badminton Horse Trials, cascading water sheets exploding in the afternoon sun as the crowd blurs in the background. Shot on a 600mm at 1/1250s f/5.6. Vivid action grade, blue water and green turf. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A pair of Belgian draft horses pulls a vintage hay wagon through a Vermont covered bridge in autumn, the covered bridge a warm tunnel of orange maple leaves. Shot on a 50mm at f/5.6, natural light from the bridge opening. Rich harvest gold and russet autumn color grade. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A spotted Appaloosa racehorse crosses the finish line in a native American flat race, face twisted with effort, nostrils wide, surrounded by the thundering hooves of rivals. Shot on a 1000mm mirror lens at f/11 for full sharpness. Intense dynamic action grade. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A lone buckskin mustang stands on a red sandstone mesa in Monument Valley at sunset, silhouetted against skies of fire, the iconic Mittens formations in the background. Shot on a 300mm at f/8. Classic American Southwest silhouette grade with burning orange and deep purple. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A Lusitano stallion and skilled bullfighter perform a rejoneado in a traditional Portuguese arena, the horse\'s collection and power on full display in the golden afternoon light. Shot on a 400mm at f/4. Warm ochre arena sand and vivid costume colors. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A grey Thoroughbred filly stares directly at the camera through the bars of its stable door, curious and intensely intelligent, one white star on its forehead. Shot on an 85mm at f/1.8, shallow depth of field melting the background. Intimate close portrait grade with warm stable amber tones. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A bay warmblood show jumper soars over a massive Swedish oxer in a packed indoor arena, stadium lights blazing, crowd roaring, CSIO5 banner visible. Shot on a 400mm at 1/2000s f/4. Vivid indoor arena lighting grade with crowd depth. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. Wild horses roll and play in the surf of Assateague Island at sunrise, the barrier island\'s pine-backed dunes glowing orange behind them. Shot on a 500mm at f/5.6, low angle from the beach. Coastal dawn grade, pastel pink sky reflecting in tide pools. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A pure white Kladruber ceremonial horse carries a rider in full Imperial Austrian regalia during a baroque procession in Prague Castle courtyard, cobblestones gleaming from recent rain. Shot on a 200mm at f/4. Regal deep-red-and-gold imperial color grade. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A herd of Brumby horses splashes through a flooded Australian river in tropical Queensland, the jungle a vibrant emerald wall behind them, reflected in the brown water. Shot on a drone from 80 feet altitude with a 50mm equivalent. Lush tropical palette, emerald and amber. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A black stallion runs along a beach at night lit by a full moon, the ocean lit silver, its hoofprints dark in the moonlit wet sand. Long exposure shot on a 135mm at f/2 for 2 seconds, motion blur in the mane. Silver-blue moonlit monochrome grade. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. An elder bay mare grazes in a misty meadow in the Scottish Highlands, a ruined castle barely visible through the morning fog behind her. Shot on a 200mm at f/4, atmospheric mist rendering the castle ethereal. Moody Scottish grey-green-and-heather color grade. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A chestnut quarter horse works a cutting cow in a dusty Texas arena under blazing summer sun, the horse\'s haunches nearly touching the ground, every muscle engaged. Shot on a 300mm at 1/1000s f/5.6. Hot Texan summer grade, dirt dust and cowboy steel. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A grey Connemara pony leads three smaller ponies along a rugged Connemara sea-cliff path at sunset, the Atlantic gleaming jade-green below. Shot on a 135mm at f/5.6 for full depth in the coastal landscape. Wild Irish Atlantic grade, slate and jade and gold. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A Thoroughbred racehorse is sponged down in the pre-race wash bay, its sleek coat beaded with water catching the overhead fluorescent light, a groom in racing silks at its side. Shot on a 50mm at f/2.8, indoor overhead lighting and detail. Clean clinical sports grade. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A herd of Haflinger ponies in their thick winter coats run through a snow-covered Tyrolean mountain meadow, the Alps towering behind, Austrian church spire in the valley. Shot on a 400mm at f/5.6. Alpine winter grade, crisp white snow and cobalt sky. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A roan Nokota horse drinks from a mirror-still prairie pond at dawn, head low, the pastel sky and hills reflected perfectly beneath its muzzle. Shot on a 300mm at f/4, low dawn angle from the opposite bank. Soft prairie dawn palette, rose gold and pale lavender. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A Spanish Riding School Lipizzaner performs a piaffe in the famous tan-walled Vienna winter riding hall, crystal chandeliers ablaze above it. Shot on a 200mm at f/3.5, warm indoor light. Historic gold-and-cream Baroque grade. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A rider-less black Thoroughbred runs free on a misty Newmarket gallops in early morning, groundsmen in hi-vis silhouettes watching from the rail, dew heavy on the turf. Shot on a 600mm at f/5.6. Cool grey British morning grade. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A palomino stallion rears against a burning Californian wildfire sunset, silhouetted in gold and red, the sky apocalyptic with layers of smoke and light. Shot on a 300mm at f/8. Dramatic fire-sky grade, deep crimson and molten gold. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. Two Miniature horses play in a field of blooming lavender in Provence, France, their tiny legs hidden by the purple crop as a honey bee hovers in the foreground. Shot on a 135mm at f/2.8 with lavender bokeh. Dreamy Provence lavender grade. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A Thoroughbred horse auction at Keeneland, a gleaming bay yearling circled in the spotlight under the auctioneer\'s chant, bidders in suits watching intently. Shot on a 85mm at f/2. Warm auction spotlight grade, old Kentucky tradition. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Horses',text:'Ultra photorealistic, real photograph. A herd of Welsh mountain ponies grazes the summit ridge of the Brecon Beacons in Wales, the valley below submerged in a sea of white cloud, peaks emerging like islands. Shot on a 24mm at f/11. Epic aerial-feel grade, cloud sea and moorland. 8K resolution, ultra-detailed, professional quality.'},

                /* ─── BIRDS (50) ─── */
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A bald eagle swoops low over a glassy Alaskan river, talons outstretched, a large sockeye salmon half out of the water in its grip, spray diamonds in the air. Shot on a 600mm at f/5.6 at 1/2000s. Cool Alaskan river grade, silver water and white spruce. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A male Anna\'s hummingbird hovers at a red cardinal flower, its iridescent magenta gorget lit up like a jewel by direct afternoon sun, wings invisible at 1/8000s. Shot on a 500mm with a 1.4x teleconverter at f/8. Vivid jewel-tone grade, magenta and emerald. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A great grey owl perches on a snow-laden spruce branch in a Yukon winter forest, its enormous facial disc staring directly at the camera, snowflakes settling on its feathers. Shot on a 400mm at f/4. Cold blue-grey winter forest grade. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A male Indian peafowl fans its full iridescent train in a lush green monsoon garden in Rajasthan, each eye feather sparkling in the diffuse cloudy light. Shot on a 200mm at f/5.6. Saturated jewel-box grade, emerald green and electric blue. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A common kingfisher plunges into a clear chalk stream in Hampshire, England, a tiny trail of bubbles marking its vertical dive, its electric blue back catching light. Shot at 1/4000s on a 800mm at f/7.1. Clean stream grade, crystal water and chalk-stream greens. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A flock of greater flamingos lifts off a soda lake in Kenya\'s Rift Valley at dawn, an explosion of pink wings over the pink-tinged water, Mount Longonot volcano behind. Shot on a 500mm at f/7.1. Flamingo pink and volcan grey grade. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A scarlet macaw pair sits on a rainforest branch in Costa Rica\'s Corcovado, the red, blue, and yellow of their plumage impossibly vivid against a deep jungle green. Shot on a 300mm at f/4. Tropical saturated grade, primary colors against lush green. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A mute swan glides across a mirror-still lake at sunrise in the English Lake District, its reflection a perfect white double below, low mist on the water. Shot on a 400mm at f/5.6. Tranquil misty dawn grade, ivory and mist. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A red-tailed hawk mantles over a freshly caught cottontail rabbit in a snowy New England meadow, wings spread wide, fierce eyes direct. Shot on a 600mm at f/5.6. Cold winter grade, russet hawk against white snow. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A keel-billed toucan perches on a mossy branch in Belize rainforest, its absurdly large rainbow bill held high, humid morning mist softening the jungle behind it. Shot on a 300mm at f/4. Lush humid jungle grade, rainbow bill pop against deep green. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A snowy owl hunts at twilight across a vast white prairie in Manitoba, wings perfectly silent and level, golden eyes locked on invisible prey below the snow. Shot on a 800mm at f/6.3. Blue twilight grade with ghostly white owl. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A superb bird-of-paradise performs its extraordinary courtship display on a mossy New Guinea log, the female a mere brown bird watching the male\'s vivid blue crescent and black velvet shield. Shot on a 500mm at f/4. Dark intimate forest grade, neon blue against black. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A wandering albatross soars on dynamic air currents above the wild Southern Ocean, its enormous 3.5-metre wingspan barely moving as it rides the gale, white against roiling grey storm clouds. Shot on a 600mm from a ship\'s deck at f/7.1. Dramatic stormy ocean grade. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A male resplendent quetzal floats through cloud forest in Guatemala\'s highlands, its extraordinary metre-long tail streamers trailing below it, emerald and crimson in dappled cloud light. Shot on a 400mm at f/4. Magical cloud forest grade, emerald mist and crimson. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A northern gannet plunges into the North Sea at 90km/h, the moment of entry captured with explosive water corona around its streamlined body, 30 other gannets diving behind it. Shot at 1/4000s on a 600mm f/5.6. Cool North Atlantic grade, blue-grey sea and white birds. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A rainbow lorikeet and sulfur-crested cockatoo share a flowering eucalyptus branch in Sydney, Australia, their complementary color schemes making a natural still life against the blue harbour sky. Shot on a 300mm at f/4. Vivid Australian grade, rainbow parrot and white cockatoo. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. An Atlantic puffin lands at its clifftop burrow on the Farne Islands, beak crammed with a row of gleaming sand eels, the North Sea turquoise behind it. Shot on a 500mm at f/5.6. Fresh coastal grade, puffin orange beak and turquoise sea. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A harpy eagle perches on a ceiba tree in the Amazon rainforest, its enormous taloned feet visible, its grey-and-white plumage and piercing pale eyes giving it an almost human expression. Shot on a 400mm at f/5.6. Deep jungle grade, dappled equatorial light. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A snowy egret dances through a Florida wetland shallow, wings raised ballet-like as it chases small fish, golden feet churning the water, reflected in the mirror surface. Shot on a 600mm at f/5.6 from water level. Warm Florida wetland grade, gold and white and reflections. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A male mandarin duck swims on a still Japanese garden pond in Kyoto during autumn, its extraordinary multi-colored plumage reflected in the still water, fallen maple leaves floating around it. Shot on a 400mm at f/4. Autumnal Japanese garden grade, red maple and iridescent duck. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A eurasian eagle owl takes flight from a rocky Scottish Highland cliff edge at dusk, enormous orange eyes aglow, two-metre wingspan fully extended against a purple heather hillside. Shot on a 500mm at f/5.6 in last light. Moody highland dusk grade, heather purple and amber eyes. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A Cape gannet colony of 200,000 birds covers Bird Island in South Africa, the rock barely visible under white feathers, the sound and smell implied by sheer visual density. Shot on a 24mm drone-angle from 60 feet. Vast colony grade, white birds on rust rock. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A golden eagle locks talons with a red fox in a dramatic mid-air struggle over a Scottish glen, both animals suspended and straining, snow-capped peaks behind. Shot on a 600mm at 1/2000s f/5.6. Epic Highland confrontation grade. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A lilac-breasted roller perches on an acacia thorn in the Serengeti, the first warm light of day setting its extraordinary multi-colored plumage ablaze against an electric blue African sky. Shot on a 500mm at f/5.6. Vivid African dawn grade, lilac and cobalt and gold. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A boreal chickadee feeds at a frozen winter feeder in Ontario during a blizzard, clinging upside-down to a suet cage, snowflakes like cotton wool all around its tiny form. Shot on a 300mm at f/4. Soft blizzard grade, warm feeder light and cold snow. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A peregrine falcon stoops on a racing pigeon over London\'s Battersea Power Station, the Thames glinting below, the power station\'s chimneys framing the drama of the stoop. Shot on a 800mm at 1/3200s f/6.3. Urban drama grade, industrial grey and falcon speed. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A blue-footed booby performs its extraordinary high-step courtship dance on a Galapagos lava rock, brilliant turquoise feet displayed to a disinterested female, volcanic ocean behind. Shot on a 200mm at f/5.6. Galapagos grade, turquoise feet and volcanic rock. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A pair of whooper swans calls in unison on a frozen Finnish lake at -25°C, their breath condensing in massive clouds, the rising sun turning everything gold and pink. Shot on a 400mm at f/5.6. Arctic dawn grade, gold sun and icy breath clouds. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A secretary bird strides across the Kenyan savanna grass, its extraordinary long legs and crest feathers making it look like a Victorian naturalist\'s illustration come to life. Shot on a 600mm at f/5.6. Golden savanna grade, tall grass and African morning light. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A male Victoria\'s riflebird performs its extraordinary mating display, wings wide, iridescent chest like a shifting oil slick, calling into the rainforest canopy of Queensland. Shot on a 300mm at f/4. Intimate rainforest grade, iridescent black and green. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A snowy plover chick the size of a golf ball runs across white Pensacola beach sand, its downy speckled back making it nearly invisible, a human footprint for scale nearby. Shot on a 500mm macro at f/8 from a prone position. Fine-detail beach grade, speckled down and white sand. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A great white pelican soars with a flock of 40 others in a thermal column over Lake Malawi, seen from directly below, their silver and white wings making a graphic pattern against the blue sky. Shot on a 24mm pointing straight up at f/8. Graphic aerial grade, pelican wings and pure blue sky. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A male Raggiana bird-of-paradise explodes in a display at a Papua New Guinea lek, brilliant orange plumes fanned wide, hanging upside-down from a branch, four females watching below. Shot on a 400mm at f/4. Jewel-box jungle grade, orange and green fire. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A Eurasian jay lands in a Surrey woodland bluebell carpet in spring, its blue wing-flash vivid against the sea of violet-blue flowers, beak stuffed with acorns for caching. Shot on a 300mm at f/4. English spring grade, bluebell violet and jay blue. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A long-eared owl roosts at midday in a dense cedar thicket in Idaho, its elongated ear tufts erect, orange eyes reduced to slits, perfectly bark-camouflaged if not for the ear tufts. Shot on a 600mm at f/5.6. Dense forest roost grade, bark texture and amber detail. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A black skimmer skims the Florida intracoastal at dusk, lower mandible cutting the water surface, leaving a perfect wake-line, the pink-orange sky reflected in the water. Shot on a 800mm at f/5.6 from water level. Glowing dusk grade, pink reflections and wake line. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A cock-of-the-rock at a Venezuelan cloud forest lek, its extraordinary disc-like crest of brilliant orange framing its face, displaying to rivals in the dappled light. Shot on a 400mm at f/4. Cloud forest grade, orange disc against deep green. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A barn swallow feeds its gaping chick in a mid-air pass, both in flight, the parent\'s graceful form and forked tail contrasting with the bulging chick, a pastoral English farmyard below. Shot at 1/3200s on a 500mm f/5.6. English summer grade, graceful swallows and golden farmland. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A Philippine eagle, one of the world\'s largest and rarest raptors, perches in a Philippine rainforest tree, its shaggy brown-and-white mane making it look truly lion-headed. Shot on a 500mm at f/5.6. Rare forest grade, majestic mane and forest light. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A red-crowned Japanese crane dances in falling snow at Kushiro Marsh in Hokkaido, its red crown like a flame, a second crane answering its call, both partially veiled by snowflakes. Shot on a 600mm at f/5.6. Classic Japanese winter grade, crane and falling snow. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. An American wood thrush sings from a silver birch branch in a spring Appalachian forest, beak wide open, the notes implied by its intensity, sunlight filtering through fresh green leaves above. Shot on a 400mm at f/4. Fresh spring grade, spotted thrush and pale birch. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A shoebill stork stands motionless as a statue in a Ugandan papyrus swamp, its extraordinary shoe-shaped bill giving it a prehistoric, almost dinosaurian presence. Shot on a 600mm at f/5.6 from a canoe. Grey wetland grade, shoebill blue-grey and papyrus green. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A European roller lands on a vineyard post in Extremadura, Spain, wings still open showing the extraordinary electric-blue flash of its underwings against a harsh Spanish noon sky. Shot on a 500mm at f/6.3. Spanish summer grade, electric blue and terracotta vineyard. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A Steller\'s sea eagle stands atop a drift ice floe off Hokkaido, Japan, sea spray in the air, the enormous bird dwarfing the ice block, an orca dorsal fin visible in the background. Shot on a 800mm at f/6.3. Epic North Pacific grade, white ice and orca sea. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A flock of European starlings murmurs at sunset over the Somerset Levels in England, 100,000 birds forming an ever-shifting dark cloud shape above the flat marshland, the sky ablaze. Shot on a 70mm at f/8. Murmurating grade, starling cloud and sunset fire. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A male Himalayan monal pheasant stands on a snowy Himalayan ridge, its extraordinary multicolored plumage a riot of metallic green, purple, red, and orange in sharp mountain light. Shot on a 600mm at f/5.6 at altitude. Crisp mountain grade, jewel pheasant and white snow. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A belted kingfisher hovers in place above a Canadian lake, beak pointed straight down, about to plunge for a visible brook trout below the surface, lake reflections shimmering. Shot at 1/2000s on a 600mm f/5.6. Crystal lake grade, hovering kingfisher and visible fish. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A pair of macaw hybrids — a Catalina and a Blue-and-Gold — sit on a branch together in a Florida sanctuary, their plumage a kaleidoscopic comparison of genetics. Shot on a 300mm at f/4. Vivid tropical grade, complementary parrot colors. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A snowy owl female lands on a frozen tundra lake near Churchill, Manitoba, the landing gear of her taloned feet outstretched, wings cupped, a blizzard beginning behind her. Shot at 1/1000s on a 800mm f/6.3. Arctic drama grade, white owl against white storm. 8K resolution, ultra-detailed, professional quality.'},
                {cat:'Birds',text:'Ultra photorealistic, real photograph. A martial eagle, Africa\'s most powerful raptor, tears at a Vervet monkey on a Kruger Park termite mound, talons the size of a man\'s hand gleaming, other monkeys watching from a safe tree. Shot on a 600mm at f/5.6 in morning light. Raw African nature grade, fierce power and savanna gold. 8K resolution, ultra-detailed, professional quality.'}
            ];
            // Inject into the prompt library grid directly
            var grid = document.getElementById('pl-grid');
            var filterDiv = document.getElementById('pl-filters');
            if (grid && filterDiv) {
                // Store prompts globally for filtering
                window._extraPrompts = horseAndBirdPrompts;

                // Add category buttons
                var existingCats = filterDiv.querySelectorAll('.pl-cat');
                var catTexts = [];
                existingCats.forEach(function(c){ catTexts.push(c.textContent.trim()); });

                ['Horses','Birds'].forEach(function(cat) {
                    if (catTexts.indexOf(cat) === -1) {
                        var btn = document.createElement('div');
                        btn.className = 'pl-cat';
                        btn.textContent = cat;
                        btn.style.cssText = 'display:inline-block !important;width:auto !important;';
                        btn.onclick = function() {
                            // Show only this category
                            document.querySelectorAll('.pl-cat').forEach(function(c){ c.classList.remove('active'); });
                            btn.classList.add('active');
                            // Hide main grid cards
                            grid.querySelectorAll('.pl-card:not(.extra-prompt)').forEach(function(c){ c.style.display = 'none'; });
                            // Show matching extra cards, hide non-matching
                            grid.querySelectorAll('.pl-card.extra-prompt').forEach(function(c){
                                c.style.display = c.dataset.cat === cat ? '' : 'none';
                            });
                            var countEl = document.getElementById('pl-count');
                            if (countEl) countEl.textContent = window._extraPrompts.filter(function(p){return p.cat===cat;}).length + ' prompts';
                        };
                        filterDiv.appendChild(btn);
                    }
                });

                // Override All button to also show extra prompts
                var allBtn = filterDiv.querySelector('.pl-cat.active');
                if (allBtn) {
                    var origClick = allBtn.onclick;
                    allBtn.onclick = function() {
                        if (origClick) origClick.call(this);
                        if (typeof window.plCat === 'function') window.plCat('All');
                        grid.querySelectorAll('.pl-card.extra-prompt').forEach(function(c){ c.style.display = ''; });
                    };
                }

                // Add prompt cards to grid
                var base = window.location.origin;
                horseAndBirdPrompts.forEach(function(p, i) {
                    var card = document.createElement('div');
                    card.className = 'pl-card extra-prompt';
                    card.dataset.cat = p.cat;
                    card.innerHTML = '<span class="pl-card-tag" style="background:rgba(248,24,148,0.15);color:#F81894;">' + p.cat.toUpperCase() + '</span>'
                        + '<p id="pl-extra-' + i + '">' + p.text.replace(/</g,'&lt;') + '</p>'
                        + '<button class="pl-copy" onclick="var t=document.getElementById(\'pl-extra-' + i + '\').textContent;navigator.clipboard.writeText(t);this.textContent=\'Copied!\';setTimeout(function(){this.textContent=\'Copy\';}.bind(this),1500);">Copy</button>'
                        + ' <a class="pl-use" href="' + base + '/tools/image-generator/" onclick="navigator.clipboard.writeText(document.getElementById(\'pl-extra-' + i + '\').textContent)">Use in Image Generator &rarr;</a>';
                    grid.appendChild(card);
                });

                // Update count
                var countEl = document.getElementById('pl-count');
                if (countEl) {
                    var current = parseInt(countEl.textContent) || 0;
                    countEl.textContent = (current + horseAndBirdPrompts.length) + ' prompts';
                }
            }
        }
    }, 1000);
    setTimeout(function(){ clearInterval(checkInterval); }, 15000);
})();
</script>
    <?php
}

// ─────────────────────────────────────────────────────────────────────────────
// 5. CHAT ASSISTANT FIX (remove "talking pets", update to agents)
// ─────────────────────────────────────────────────────────────────────────────
add_action( 'wp_footer', 'wavesai_polishing_chatbot_fix', 203 );
function wavesai_polishing_chatbot_fix() {
    ?>
<script id="wavesai-polishing-chatbot-fix">
(function(){
    setTimeout(function(){
        // Fix chatbot intro message
        var botMsgs = document.querySelectorAll('#chatbot-messages .chatbot-msg.bot');
        if(botMsgs.length > 0){
            botMsgs[0].textContent = 'Hi there! I\'m your WavesAI assistant. I can help you with our AI agents, image generation, video creation, website building, business coaching, and more. Ask me anything!';
        }
        // Fix suggestion buttons
        var suggestions = document.querySelectorAll('#chatbot-suggestions button');
        var newSuggestions = [
            'What AI agents do you have?',
            'How does Video Studio work?',
            'How do I get started?',
            'What are the pricing plans?'
        ];
        suggestions.forEach(function(btn, i){
            if(newSuggestions[i]) btn.textContent = newSuggestions[i];
        });
    }, 500);
})();
</script>
    <?php
}

// ─────────────────────────────────────────────────────────────────────────────
// 6. ADD VIDEO STUDIO CARD TO DASHBOARD
// ─────────────────────────────────────────────────────────────────────────────
add_action( 'wp_footer', 'wavesai_polishing_video_studio_card', 204 );
function wavesai_polishing_video_studio_card() {
    $vs_url = esc_url( home_url('/tools/video-studio/') );
    ?>
<script id="wavesai-polishing-video-studio">
(function(){
    setTimeout(function(){
        var grid = document.querySelector('#wavesai-dashboard .wavesai-tools-grid');
        if(!grid) return;
        // Check if Video Studio card already exists
        var exists = false;
        grid.querySelectorAll('a').forEach(function(a){
            if(a.href && a.href.indexOf('video-studio') !== -1) exists = true;
        });
        if(exists) return;
        var card = document.createElement('a');
        card.href = '<?php echo $vs_url; ?>';
        card.className = 'wavesai-tool-card-v2';
        card.style.cssText = 'background:#332628 !important;';
        card.innerHTML = '<span class="tool-icon">&#127916;</span><div><h4>Video Studio</h4><p class="tool-desc">Create AI videos with Higgsfield, video ads, and storyboards.</p><span class="tool-cost">&#9889; 10 credits</span></div>';
        // Insert after AI Chatbot (6th card) or at the end
        var cards = grid.querySelectorAll('.wavesai-tool-card-v2');
        if(cards.length >= 5){
            cards[4].parentNode.insertBefore(card, cards[4].nextSibling);
        } else {
            grid.appendChild(card);
        }
    }, 1000);
})();
</script>
    <?php
}

// ─────────────────────────────────────────────────────────────────────────────
// 7. LANDING PAGE WORDING FIX (change "Works While You Sleep" messaging)
// ─────────────────────────────────────────────────────────────────────────────
add_action( 'wp_footer', 'wavesai_polishing_landing_wording', 205 );
function wavesai_polishing_landing_wording() {
    ?>
<script id="wavesai-polishing-landing-wording">
(function(){
    setTimeout(function(){
        // Fix hero H1 heading - "Works While You Sleep" => "Helps You Get More Done"
        var h1s = document.querySelectorAll('h1.elementor-heading-title, h1');
        for(var i=0;i<h1s.length;i++){
            var t = h1s[i].textContent.trim();
            if(t === 'Works While You Sleep'){
                h1s[i].textContent = 'Helps You Get More Done';
            }
        }

        // Fix the feature cards / tool menu text that says "8 AI Systems That Work While You Sleep"
        document.querySelectorAll('h2, h3, h4, p, span, div').forEach(function(el){
            if(el.children && el.children.length > 0) return;
            var txt = el.textContent.trim();
            if(txt.indexOf('Work While You Sleep') !== -1 || txt.indexOf('Works While You Sleep') !== -1){
                el.textContent = txt.replace(/Works? While You Sleep/gi, 'Helps You Get More Done');
            }
        });
    }, 800);
    setTimeout(function(){
        var h1s = document.querySelectorAll('h1.elementor-heading-title, h1');
        for(var i=0;i<h1s.length;i++){
            if(h1s[i].textContent.trim() === 'Works While You Sleep'){
                h1s[i].textContent = 'Helps You Get More Done';
            }
        }
    }, 3500);
})();
</script>
    <?php
}

// ─────────────────────────────────────────────────────────────────────────────
// 8. MOBILE OVERFLOW FIX (Business Coach grid JS override)
// ─────────────────────────────────────────────────────────────────────────────
add_action( 'wp_footer', 'wavesai_polishing_mobile_overflow_js', 206 );
function wavesai_polishing_mobile_overflow_js() {
    ?>
<script id="wavesai-polishing-mobile-overflow">
(function(){
    if(window.innerWidth > 768) return;
    setTimeout(function(){
        // Fix Business Coach 6-card grid to 2 columns on mobile
        var coachWrap = document.querySelector('.wavesai-coach-wrap');
        if(coachWrap){
            var grids = coachWrap.querySelectorAll('div[style]');
            grids.forEach(function(g){
                var s = g.getAttribute('style') || '';
                if(s.indexOf('repeat(3') !== -1 && s.indexOf('grid-template') !== -1){
                    g.style.gridTemplateColumns = 'repeat(2, 1fr)';
                }
            });
        }

        // Ensure all tool containers don't overflow
        document.querySelectorAll('.wavesai-tool-container').forEach(function(c){
            c.style.maxWidth = '100%';
            c.style.overflowX = 'hidden';
        });
    }, 500);
})();
</script>
    <?php
}

// ─────────────────────────────────────────────────────────────────────────────
// 9. ENHANCED WEBSITE ANALYSIS (actually fetches and reads the website)
// ─────────────────────────────────────────────────────────────────────────────
add_action( 'rest_api_init', 'wavesai_polishing_register_enhanced_analysis' );
function wavesai_polishing_register_enhanced_analysis() {
    register_rest_route( 'wavesai/v1', '/agent-analyse-enhanced', [
        'methods' => 'POST',
        'callback' => 'wavesai_polishing_enhanced_analysis',
        'permission_callback' => function() { return is_user_logged_in(); },
    ]);
}

function wavesai_polishing_enhanced_analysis( WP_REST_Request $request ) {
    $user_id = get_current_user_id();
    $nonce = $request->get_header('X-WavesAI-Nonce');
    if ( ! wp_verify_nonce( $nonce, 'wavesai_api' ) && ! wp_verify_nonce( $nonce, 'wp_rest' ) ) {
        return new WP_Error( 'bad_nonce', 'Security check failed.', [ 'status' => 403 ] );
    }

    $website_url = sanitize_text_field( $request->get_param('website_url') ?? '' );
    $business_name = sanitize_text_field( $request->get_param('business_name') ?? '' );
    $agent_type = sanitize_text_field( $request->get_param('agent_type') ?? '' );

    if ( empty( $website_url ) ) {
        return new WP_Error( 'missing_url', 'Please enter a website URL.', [ 'status' => 400 ] );
    }

    $cost = 5;
    $credits = wavesai_get_credits( $user_id );
    if ( $credits['balance'] < $cost ) {
        return new WP_Error( 'no_credits', 'Not enough credits.', [ 'status' => 402 ] );
    }

    $agent_names = [
        'social-media' => 'Social Media', 'email-marketing' => 'Email Marketing',
        'seo-content' => 'SEO', 'ad-copy' => 'Ad Copy', 'cold-outreach' => 'Cold Outreach',
        'brand-strategy' => 'Brand Strategy', 'personal-agent' => 'Personal',
        'fitness' => 'Fitness', 'wellness' => 'Wellness', 'skincare' => 'Skincare',
        'nutrition' => 'Nutrition', 'mindset' => 'Mindset', 'relationships' => 'Relationships',
        'finance' => 'Finance', 'legal' => 'Legal', 'education' => 'Education',
        'monetisation' => 'Monetisation',
    ];
    $agent_label = $agent_names[ $agent_type ] ?? 'General';

    // Actually fetch the website content
    $site_content = '';
    $response = wp_remote_get( $website_url, [
        'timeout' => 15,
        'user-agent' => 'Mozilla/5.0 (compatible; WavesAI/1.0)',
        'sslverify' => false,
    ]);

    if ( ! is_wp_error( $response ) && wp_remote_retrieve_response_code( $response ) === 200 ) {
        $html = wp_remote_retrieve_body( $response );
        // Extract title
        preg_match( '/<title[^>]*>(.*?)<\/title>/si', $html, $title_match );
        $page_title = ! empty( $title_match[1] ) ? trim( strip_tags( $title_match[1] ) ) : '';
        // Extract meta description
        preg_match( '/<meta[^>]*name=["\']description["\'][^>]*content=["\']([^"\']*)["\'][^>]*/si', $html, $desc_match );
        $meta_desc = ! empty( $desc_match[1] ) ? trim( $desc_match[1] ) : '';
        // Extract visible text (strip scripts, styles, tags)
        $text = preg_replace( '/<script[^>]*>.*?<\/script>/si', '', $html );
        $text = preg_replace( '/<style[^>]*>.*?<\/style>/si', '', $text );
        $text = preg_replace( '/<nav[^>]*>.*?<\/nav>/si', '', $text );
        $text = preg_replace( '/<footer[^>]*>.*?<\/footer>/si', '', $text );
        $text = strip_tags( $text );
        $text = preg_replace( '/\s+/', ' ', $text );
        $text = trim( $text );
        // Limit to ~3000 chars to fit in context
        if ( strlen( $text ) > 3000 ) {
            $text = substr( $text, 0, 3000 ) . '...';
        }
        $site_content = "Page Title: {$page_title}\nMeta Description: {$meta_desc}\n\nWebsite Content:\n{$text}";
    } else {
        $site_content = "(Could not fetch website - analysing based on URL and business name only)";
    }

    $system = "You are a senior {$agent_label} consultant. You have been given the actual content scraped from a business website. Provide a thorough, specific analysis:\n\n"
        . "1. What this business does (based on the actual website content you can see)\n"
        . "2. Their current strengths (what they are doing well)\n"
        . "3. Specific {$agent_label} recommendations with actionable steps\n"
        . "4. Quick wins they can implement this week\n"
        . "5. Longer-term strategy suggestions\n\n"
        . "Be specific - reference actual content, products, services, and messaging you can see on their website. Give concrete, actionable advice, not generic tips. Keep it to 300-400 words.";

    $user_prompt = "Business: " . ( $business_name ?: 'Unknown' ) . "\nWebsite: {$website_url}\n\n--- WEBSITE CONTENT ---\n{$site_content}";

    $messages = [
        [ 'role' => 'system', 'content' => $system ],
        [ 'role' => 'user', 'content' => $user_prompt ],
    ];

    $result = wavesai_chat( $messages, [ 'max_tokens' => 1000, 'temperature' => 0.7 ] );
    if ( is_wp_error( $result ) ) {
        return new WP_Error( 'ai_error', 'Analysis failed. Please try again.', [ 'status' => 500 ] );
    }

    $analysis = trim( $result['choices'][0]['message']['content'] ?? '' );
    if ( empty( $analysis ) ) {
        return new WP_Error( 'empty', 'Could not generate analysis.', [ 'status' => 500 ] );
    }

    wavesai_deduct_credits( $user_id, $cost, 'Enhanced Website Analysis - ' . $agent_label );

    return rest_ensure_response([
        'success' => true,
        'analysis' => $analysis,
        'credits_used' => $cost,
        'credits_remaining' => wavesai_get_credits( $user_id )['balance'],
    ]);
}

// Override the agent analyse JS to use enhanced endpoint
add_action( 'wp_footer', 'wavesai_polishing_enhanced_analysis_js', 207 );
function wavesai_polishing_enhanced_analysis_js() {
    ?>
<script id="wavesai-polishing-enhanced-analysis">
(function(){
    // Override the agent website analysis to use enhanced endpoint
    if(typeof window.wavesaiAgentAnalyse === 'function'){
        var origAnalyse = window.wavesaiAgentAnalyse;
        window.wavesaiAgentAnalyse = function(){
            var urlInput = document.getElementById('agent-website-url');
            var nameInput = document.getElementById('agent-biz-name');
            var typeInput = document.getElementById('agent-type-select') || document.querySelector('[name="agent_type"]');
            if(!urlInput || !urlInput.value) {
                return origAnalyse.apply(this, arguments);
            }
            var btn = document.getElementById('agent-analyse-btn');
            if(btn) { btn.disabled = true; btn.textContent = 'Analysing website...'; }
            var resultDiv = document.getElementById('agent-analysis-result');
            if(resultDiv) resultDiv.innerHTML = '<div style="text-align:center;padding:20px;"><div style="width:32px;height:32px;border:3px solid rgba(248,24,148,0.15);border-top-color:#F81894;border-radius:50%;animation:spin 1s linear infinite;margin:0 auto 10px;"></div><p style="color:rgba(51,38,40,0.5);font-size:13px;">Reading and analysing your website...</p></div>';
            var nonce = '';
            var metaEl = document.querySelector('meta[name="wavesai-nonce"]');
            if(metaEl) nonce = metaEl.content;
            if(!nonce && typeof wavesaiNonce !== 'undefined') nonce = wavesaiNonce;
            fetch('/wp-json/wavesai/v1/agent-analyse-enhanced', {
                method: 'POST',
                headers: { 'Content-Type':'application/json', 'X-WavesAI-Nonce': nonce, 'X-WP-Nonce': nonce },
                body: JSON.stringify({
                    website_url: urlInput.value,
                    business_name: nameInput ? nameInput.value : '',
                    agent_type: typeInput ? typeInput.value : ''
                })
            })
            .then(function(r){ return r.json(); })
            .then(function(data){
                if(btn) { btn.disabled = false; btn.textContent = 'Analyse Website'; }
                if(data.analysis){
                    if(resultDiv) resultDiv.innerHTML = '<div style="background:rgba(248,24,148,0.06);border:1px solid rgba(248,24,148,0.15);border-radius:12px;padding:16px;"><h4 style="color:#332628;margin:0 0 10px;font-size:15px;">Website Analysis</h4><div style="color:#332628;font-size:14px;line-height:1.7;white-space:pre-wrap;">' + data.analysis.replace(/</g,'&lt;').replace(/\n/g,'<br>') + '</div></div>';
                    if(typeof wavesaiUpdateCreditsDisplay === 'function' && data.credits_remaining !== undefined) wavesaiUpdateCreditsDisplay(data.credits_remaining);
                } else {
                    if(resultDiv) resultDiv.innerHTML = '<p style="color:#e74c3c;font-size:13px;">Analysis failed: ' + (data.message || 'Unknown error') + '</p>';
                }
            })
            .catch(function(e){
                if(btn) { btn.disabled = false; btn.textContent = 'Analyse Website'; }
                return origAnalyse.apply(this, arguments);
            });
        };
    }
})();
</script>
    <?php
}

// ─────────────────────────────────────────────────────────────────────────────
// 10. LOGO SWAP
// ─────────────────────────────────────────────────────────────────────────────
add_action( 'wp_footer', 'wavesai_polishing_logo', 202 );
function wavesai_polishing_logo() {
    $logo_url = esc_url( content_url('/uploads/2026/06/wavesai-new-logo.jpeg') );
    ?>
<script>
(function(){
    var newLogo = '<?php echo $logo_url; ?>';
    function swapLogo(){
        document.querySelectorAll('.custom-logo, .ast-custom-logo img, .site-logo-img img, header img.custom-logo').forEach(function(img){
            if(img.src !== newLogo){
                img.src = newLogo;
                img.srcset = '';
                img.style.maxHeight = '50px';
                img.style.width = 'auto';
            }
        });
    }
    swapLogo();
    setTimeout(swapLogo, 500);
    setTimeout(swapLogo, 2000);
})();
</script>
    <?php
}

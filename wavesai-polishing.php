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

/* ══════════════════════════════════════════════════════
   COMPREHENSIVE COLOR & CONTRAST FIXES (June 2024)
   Fixes green remnants, invisible text, input sizing
   ══════════════════════════════════════════════════════ */

/* ── 1. Landing page hero: kill green gradient text ── */
.elementor-element-hero03 h1.elementor-heading-title,
.elementor-element-hero03 .elementor-heading-title {
    background: none !important;
    background-image: none !important;
    -webkit-background-clip: unset !important;
    background-clip: unset !important;
    -webkit-text-fill-color: #F81894 !important;
    color: #F81894 !important;
}

/* ── 2. FAQ accordion headers: green to brown ── */
.e-n-accordion-item-title-header {
    color: #332628 !important;
}
.e-n-accordion-item-title-icon {
    color: #F81894 !important;
}

/* ── 3. Image generator step indicators ── */
.wavesai-step {
    background: rgba(51,38,40,0.06) !important;
    color: #332628 !important;
}
.wavesai-step.active {
    background: rgba(248,24,148,0.1) !important;
    color: #332628 !important;
}
.wavesai-step-num {
    background: #F81894 !important;
    color: #fff !important;
    -webkit-text-fill-color: #fff !important;
}
.wavesai-step span:not(.wavesai-step-num) {
    color: #332628 !important;
    -webkit-text-fill-color: #332628 !important;
    opacity: 1 !important;
}
.wavesai-step-content label,
.wavesai-step-content h3,
.wavesai-step-content h4 {
    color: #332628 !important;
}

/* ── 4. Input fields: fix grey on grey ── */
.wavesai-textarea,
.wavesai-select,
textarea.wavesai-textarea,
select.wavesai-select,
.qg-textarea,
.qg-select {
    background: rgba(51,38,40,0.08) !important;
    color: #332628 !important;
    border: 1px solid rgba(51,38,40,0.2) !important;
}
.wavesai-textarea::placeholder,
.qg-textarea::placeholder {
    color: rgba(51,38,40,0.45) !important;
}

/* ── 5. Brain sections: protect cream text on dark cards ── */
#wavesai-brain-section,
#wavesai-brain-section * {
    color: inherit;
}
#wavesai-brain-section h3 {
    color: #F3E9D0 !important;
}
#wavesai-brain-section h4 {
    color: #F81894 !important;
}
#wavesai-brain-section p {
    color: rgba(243,233,208,0.85) !important;
}
#wavesai-brain-section li {
    color: rgba(243,233,208,0.85) !important;
}
#wavesai-brain-section span {
    color: inherit !important;
}

/* ── 6. Reseller page stats: fix invisible green numbers ── */
.wavesai-reseller-stat-num {
    color: #F81894 !important;
    font-weight: 700 !important;
}
.wavesai-reseller-stat-label {
    color: #332628 !important;
    opacity: 1 !important;
}
.wavesai-reseller-stat-card {
    background: rgba(51,38,40,0.05) !important;
    border: 1px solid rgba(51,38,40,0.12) !important;
    border-radius: 16px !important;
}
.wavesai-reseller-stats h3,
.wavesai-reseller-stats h4 {
    color: #332628 !important;
}

/* ── 7. Reseller page: How It Works step headings ── */
.wavesai-reseller-step strong,
.wavesai-reseller-step h4,
.wavesai-reseller-step h3 {
    color: #F81894 !important;
}
.wavesai-reseller-step p,
.wavesai-reseller-step span {
    color: #332628 !important;
    opacity: 1 !important;
}
.wavesai-reseller-step .wavesai-step-num,
.wavesai-reseller-step .step-num {
    background: #F81894 !important;
    color: #fff !important;
}

/* ── 8. Reseller White Label pricing card text ── */
.wavesai-reseller-pricing span,
.wavesai-reseller-pricing .price-tag {
    color: #332628 !important;
    background: rgba(51,38,40,0.08) !important;
}
.wavesai-reseller-pricing li strong {
    color: #F81894 !important;
}

/* ── 9. Website URL input: fix tiny size ── */
input[id*="website-url"],
input[id*="site-url"],
input[placeholder*="website"],
input[placeholder*="Website"],
input[placeholder*="https://"] {
    width: 100% !important;
    min-height: 44px !important;
    padding: 10px 16px !important;
    font-size: 15px !important;
    background: rgba(51,38,40,0.08) !important;
    border: 1px solid rgba(51,38,40,0.2) !important;
    border-radius: 12px !important;
    color: #332628 !important;
    box-sizing: border-box !important;
}

/* ── 10. AI Chat input: bigger ── */
#chatbot-input {
    min-height: 52px !important;
    font-size: 15px !important;
    padding: 14px 16px !important;
    width: 100% !important;
    background: rgba(51,38,40,0.06) !important;
    border: 1px solid rgba(248,24,148,0.2) !important;
    border-radius: 14px !important;
    color: #332628 !important;
}
#chatbot-input::placeholder {
    color: rgba(51,38,40,0.4) !important;
}

/* ── 11. Video Studio & Website Builder brain text ── */
.wavesai-tool-container #wavesai-brain-section p,
.wavesai-tool-container #wavesai-brain-section li,
.wavesai-tool-container #wavesai-brain-section h3,
.wavesai-tool-container #wavesai-brain-section h4,
.wavesai-tool-container #wavesai-brain-section span {
    color: inherit !important;
}
.wavesai-tool-container #wavesai-brain-section > div > div h3 {
    color: #F3E9D0 !important;
}
.wavesai-tool-container #wavesai-brain-section > div > div p {
    color: rgba(243,233,208,0.85) !important;
}
.wavesai-tool-container #wavesai-brain-section > div > div li {
    color: rgba(243,233,208,0.85) !important;
}
.wavesai-tool-container #wavesai-brain-section > div > div h4 {
    color: #F81894 !important;
}

/* ── 12. Agent pages: fix any green accent colors ── */
.wavesai-agent-sidebar .wavesai-agent-level,
.wavesai-level-badge {
    background: rgba(248,24,148,0.2) !important;
    color: #F81894 !important;
}

/* ── 13. Mode toggle buttons on image generator ── */
.wavesai-img-mode-toggle button,
.wavesai-img-mode-toggle div {
    color: #332628 !important;
    border-color: rgba(51,38,40,0.2) !important;
}
.wavesai-img-mode-toggle button.active,
.wavesai-img-mode-toggle div.active,
.wavesai-img-mode-toggle .active {
    background: #F81894 !important;
    color: #fff !important;
    border-color: #F81894 !important;
}

/* ── 14. Prompt Library grey box fix (grey -> brown) ── */
.pl-card {
    background: rgba(51,38,40,0.04) !important;
    border: 1px solid rgba(51,38,40,0.1) !important;
    color: #332628 !important;
}
.pl-card p {
    color: #332628 !important;
}

/* ── 15. Global: kill any remaining green accent colors ── */
[style*="rgb(207, 226, 196)"],
[style*="rgb(156, 175, 136)"],
[style*="rgb(140, 216, 138)"],
[style*="#CFE2C4"],
[style*="#8FB996"],
[style*="#9CAF88"],
[style*="#8CD88A"] {
    color: #F81894 !important;
}

/* ── 16. Dashboard cards text readability ── */
.wavesai-dash-card h3,
.wavesai-dash-card h4,
.wavesai-dash-card p {
    color: #F3E9D0 !important;
}

/* ── 17. Reseller marketing tips text ── */
[class*="reseller"] .tip-card p,
[class*="reseller"] .tip-card span,
[class*="reseller"] .marketing-tip p {
    color: #332628 !important;
    opacity: 1 !important;
}

/* ══════════════════════════════════════════════════════
   GREEN GRADIENT -> PINK GRADIENT OVERRIDES
   Main plugin uses sage green gradients on all buttons,
   credits bar, and step numbers. Override to pink.
   ══════════════════════════════════════════════════════ */

/* ── Credits bar ── */
.wavesai-credit-badge,
#wavesai-credit-badge,
#wavesai-balance {
    background: linear-gradient(135deg, #F81894 0%, #c41077 58%, #a00d63 100%) !important;
    background-image: linear-gradient(135deg, #F81894 0%, #c41077 58%, #a00d63 100%) !important;
    color: #fff !important;
    -webkit-text-fill-color: #fff !important;
}

/* ── Back to Dashboard link ── */
.wavesai-back-link {
    color: #332628 !important;
    background: rgba(51,38,40,0.06) !important;
}

/* ── ALL wavesai-btn buttons: green gradient to pink ── */
.wavesai-btn,
button.wavesai-btn,
a.wavesai-btn {
    background: linear-gradient(135deg, #F81894 0%, #c41077 58%, #a00d63 100%) !important;
    background-image: linear-gradient(135deg, #F81894 0%, #c41077 58%, #a00d63 100%) !important;
    color: #fff !important;
    -webkit-text-fill-color: #fff !important;
    border: none !important;
}
.wavesai-btn:hover,
button.wavesai-btn:hover,
a.wavesai-btn:hover {
    background: linear-gradient(135deg, #e01685 0%, #a00d63 58%, #8a0b55 100%) !important;
    background-image: linear-gradient(135deg, #e01685 0%, #a00d63 58%, #8a0b55 100%) !important;
}

/* ── Reseller step numbers ── */
.wavesai-reseller-step-num {
    background: #F81894 !important;
    background-image: none !important;
    color: #fff !important;
    -webkit-text-fill-color: #fff !important;
}

/* ── Reseller "How It Works" step numbers (non-class) ── */
div[style*="border-radius: 50%"][style*="gradient"] {
    background: #F81894 !important;
    background-image: none !important;
}

/* ── "Powered by ChatGPT" badge ── */
span[style*="linear-gradient(90deg"] {
    background: linear-gradient(90deg, #F81894, #c41077) !important;
    background-image: linear-gradient(90deg, #F81894, #c41077) !important;
}

/* ── Reseller referral code heading ── */
.wavesai-reseller-referral h4,
.wavesai-reseller-referral h3 {
    color: #F81894 !important;
}

/* ── Reseller rewards section ── */
.wavesai-reseller-rewards,
.wavesai-reseller-howto {
    background: rgba(51,38,40,0.04) !important;
}
.wavesai-reseller-rewards p,
.wavesai-reseller-rewards span,
.wavesai-reseller-howto p,
.wavesai-reseller-howto span {
    color: #332628 !important;
    opacity: 1 !important;
}

/* ── Tool header area ── */
.wavesai-tool-header {
    color: #332628 !important;
}

/* ── WhatsApp share button: keep green ── */
#wavesai-share-wa-btn,
button[id*="wa-btn"],
a[id*="wa-btn"] {
    background: linear-gradient(135deg, #25D366, #128C7E) !important;
    background-image: linear-gradient(135deg, #25D366, #128C7E) !important;
}

@media (max-width: 768px) {
    #chatbot-input {
        min-height: 48px !important;
        font-size: 14px !important;
    }
    input[id*="website-url"],
    input[id*="site-url"],
    input[placeholder*="website"],
    input[placeholder*="Website"],
    input[placeholder*="https://"] {
        min-height: 42px !important;
        font-size: 14px !important;
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

        // Fix green gradient on hero text
        document.querySelectorAll('.elementor-heading-title').forEach(function(el) {
            var style = window.getComputedStyle(el);
            if (style.backgroundImage && style.backgroundImage.indexOf('gradient') !== -1 && style.webkitBackgroundClip === 'text') {
                el.style.setProperty('background', 'none', 'important');
                el.style.setProperty('background-image', 'none', 'important');
                el.style.setProperty('-webkit-background-clip', 'unset', 'important');
                el.style.setProperty('background-clip', 'unset', 'important');
                el.style.setProperty('-webkit-text-fill-color', '#F81894', 'important');
                el.style.setProperty('color', '#F81894', 'important');
            }
        });

        // Fix any green-colored text globally
        document.querySelectorAll('*').forEach(function(el) {
            var style = window.getComputedStyle(el);
            var color = style.color;
            var m = color.match(/rgb\((\d+), (\d+), (\d+)\)/);
            if (m) {
                var r = parseInt(m[1]), g = parseInt(m[2]), b = parseInt(m[3]);
                if (g > 140 && g > r * 1.2 && g > b * 1.2 && !(r > 200 && g > 200 && b > 200)) {
                    if (el.closest('#wpadminbar')) return;
                    el.style.setProperty('color', '#F81894', 'important');
                }
            }
        });

        // Fix reseller stat numbers
        document.querySelectorAll('.wavesai-reseller-stat-num').forEach(function(el) {
            el.style.setProperty('color', '#F81894', 'important');
        });
        document.querySelectorAll('.wavesai-reseller-stat-label').forEach(function(el) {
            el.style.setProperty('color', '#332628', 'important');
            el.style.setProperty('opacity', '1', 'important');
        });
        document.querySelectorAll('.wavesai-reseller-stat-card').forEach(function(el) {
            el.style.setProperty('background', 'rgba(51,38,40,0.05)', 'important');
            el.style.setProperty('border', '1px solid rgba(51,38,40,0.12)', 'important');
        });

        // Fix step indicators on image generator
        document.querySelectorAll('.wavesai-step-num').forEach(function(el) {
            el.style.setProperty('background', '#F81894', 'important');
            el.style.setProperty('color', '#fff', 'important');
            el.style.setProperty('-webkit-text-fill-color', '#fff', 'important');
        });

        // Fix chatbot input height
        var chatInput = document.getElementById('chatbot-input');
        if (chatInput) {
            chatInput.style.setProperty('min-height', '52px', 'important');
            chatInput.style.setProperty('font-size', '15px', 'important');
            chatInput.style.setProperty('padding', '14px 16px', 'important');
        }

        // Fix ALL green gradient elements everywhere
        document.querySelectorAll('*').forEach(function(el) {
            if (el.closest('#wpadminbar')) return;
            var style = window.getComputedStyle(el);
            var bg = style.backgroundImage || '';
            if (bg.indexOf('gradient') !== -1 && (bg.indexOf('175, 136') !== -1 || bg.indexOf('226, 196') !== -1 || bg.indexOf('153, 104') !== -1)) {
                // Skip WhatsApp share button
                var eid = el.id || '';
                if (eid === 'wavesai-share-wa-btn' || eid === 'wavesai-copy-wa-btn') return;
                // Credits badge
                if (el.classList.contains('wavesai-credit-badge') || eid === 'wavesai-credit-badge' || eid === 'wavesai-balance') {
                    el.style.setProperty('background', 'linear-gradient(135deg, #F81894, #c41077, #a00d63)', 'important');
                    el.style.setProperty('background-image', 'linear-gradient(135deg, #F81894, #c41077, #a00d63)', 'important');
                    el.style.setProperty('color', '#fff', 'important');
                    el.style.setProperty('-webkit-text-fill-color', '#fff', 'important');
                }
                // Step numbers (round circles with numbers)
                else if (el.textContent.trim().length <= 2 && !isNaN(el.textContent.trim())) {
                    el.style.setProperty('background', '#F81894', 'important');
                    el.style.setProperty('background-image', 'none', 'important');
                    el.style.setProperty('color', '#fff', 'important');
                    el.style.setProperty('-webkit-text-fill-color', '#fff', 'important');
                }
                // All other buttons/elements
                else {
                    el.style.setProperty('background', 'linear-gradient(135deg, #F81894, #c41077, #a00d63)', 'important');
                    el.style.setProperty('background-image', 'linear-gradient(135deg, #F81894, #c41077, #a00d63)', 'important');
                    el.style.setProperty('color', '#fff', 'important');
                    el.style.setProperty('-webkit-text-fill-color', '#fff', 'important');
                }
            }
        });

        // Fix Back to Dashboard link
        document.querySelectorAll('.wavesai-back-link').forEach(function(el) {
            el.style.setProperty('color', '#332628', 'important');
            el.style.setProperty('background', 'rgba(51,38,40,0.06)', 'important');
            el.style.setProperty('background-image', 'none', 'important');
        });

        // Fix White Label faded text (cream on pink)
        document.querySelectorAll('strong').forEach(function(el) {
            var style = window.getComputedStyle(el);
            var c = style.color;
            var m = c.match(/rgb\((\d+), (\d+), (\d+)\)/);
            if (m) {
                var r = parseInt(m[1]), g = parseInt(m[2]), b = parseInt(m[3]);
                if (r > 230 && g > 230 && b > 220) {
                    var parent = el.closest('[style*="border"]') || el.closest('[class*="reseller"]');
                    if (parent) {
                        el.style.setProperty('color', '#F81894', 'important');
                    }
                }
            }
        });

        // Fix prompt library search bar
        var plSearch = document.querySelector('.pl-search');
        if (plSearch) {
            plSearch.style.setProperty('background', '#F3E9D0', 'important');
            plSearch.style.setProperty('color', '#332628', 'important');
            plSearch.style.setProperty('border', '1px solid rgba(51,38,40,0.2)', 'important');
        }

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
    function fixSleepWording(){
        document.querySelectorAll('h1, h2, h3, h4, p, span, div, a').forEach(function(el){
            var txt = el.textContent.trim();
            if(txt.indexOf('While You Sleep') !== -1){
                if(el.children && el.children.length > 0){
                    el.querySelectorAll('span, em, strong, b, i').forEach(function(child){
                        if(child.children.length === 0 && child.textContent.indexOf('While You Sleep') !== -1){
                            child.textContent = child.textContent.replace(/Works? While You Sleep/gi, 'Helps You Get More Done');
                        }
                    });
                    if(el.innerHTML.indexOf('While You Sleep') !== -1){
                        el.innerHTML = el.innerHTML.replace(/Works? While You Sleep/gi, 'Helps You Get More Done');
                    }
                } else {
                    el.textContent = txt.replace(/Works? While You Sleep/gi, 'Helps You Get More Done');
                }
            }
        });
    }
    setTimeout(fixSleepWording, 800);
    setTimeout(fixSleepWording, 2500);
    setTimeout(fixSleepWording, 5000);
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
    $logo_url = esc_url( content_url('/uploads/2026/06/wavesai-logo-pink-waves.jpeg') );
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

// ─────────────────────────────────────────────────────────────────────────────
// 11. CONTENT CALENDAR PERSISTENCE + SAVED CALENDARS
// ─────────────────────────────────────────────────────────────────────────────
add_action( 'wp_footer', 'wavesai_polishing_calendar_persistence', 208 );
function wavesai_polishing_calendar_persistence() {
    if ( ! is_user_logged_in() ) return;
    ?>
<script>
(function(){
    var KEY = 'wavesai_saved_calendars';

    function getSavedCalendars(){
        try { return JSON.parse(localStorage.getItem(KEY)) || []; }
        catch(e){ return []; }
    }

    function saveCalendar(days){
        var list = getSavedCalendars();
        list.unshift({
            date: new Date().toISOString(),
            label: new Date().toLocaleDateString('en-GB',{weekday:'long',day:'numeric',month:'long',year:'numeric'}),
            days: days
        });
        if(list.length > 10) list = list.slice(0,10);
        localStorage.setItem(KEY, JSON.stringify(list));
    }

    // Override vaRenderCalendar to also persist
    var origRender = window.vaRenderCalendar || null;
    if(typeof vaRenderCalendar === 'undefined'){
        // Wait for original to be defined, then patch
        var patchInterval = setInterval(function(){
            if(typeof vaRenderCalendar !== 'undefined' || document.getElementById('va-cal-grid')){
                clearInterval(patchInterval);
                doPatch();
            }
        }, 500);
        setTimeout(function(){ clearInterval(patchInterval); }, 15000);
    } else {
        doPatch();
    }

    function doPatch(){
        // Intercept the fetch response to capture calendar data
        var origFetch = window.fetch;
        window.fetch = function(){
            var args = arguments;
            var url = typeof args[0] === 'string' ? args[0] : (args[0]||{}).url || '';
            if(url.indexOf('content-calendar') !== -1){
                return origFetch.apply(this, args).then(function(resp){
                    var cloned = resp.clone();
                    cloned.json().then(function(d){
                        if(d.calendar && d.calendar.days){
                            saveCalendar(d.calendar.days);
                            renderSavedList();
                        }
                    }).catch(function(){});
                    return resp;
                });
            }
            return origFetch.apply(this, args);
        };

        // Add "Saved Calendars" section below the calendar grid
        var calPanel = document.getElementById('va-panel-calendar');
        if(!calPanel) return;

        var savedDiv = document.createElement('div');
        savedDiv.id = 'va-saved-calendars';
        savedDiv.style.cssText = 'margin-top:24px;';
        calPanel.appendChild(savedDiv);

        renderSavedList();
        loadLastCalendar();
    }

    function renderSavedList(){
        var savedDiv = document.getElementById('va-saved-calendars');
        if(!savedDiv) return;
        var list = getSavedCalendars();
        if(!list.length){
            savedDiv.innerHTML = '';
            return;
        }
        var html = '<div style="background:linear-gradient(135deg,rgba(248,24,148,0.08),rgba(45,90,61,0.05));border:1px solid rgba(248,24,148,0.15);border-radius:16px;padding:24px;margin-top:12px;">' +
            '<h4 style="color:#332628;font-size:16px;font-weight:700;margin:0 0 16px;display:flex;align-items:center;gap:8px;">Your Saved Calendars <span style="background:rgba(248,24,148,0.15);color:#F81894;font-size:11px;font-weight:600;padding:2px 8px;border-radius:6px;">' + list.length + ' saved</span></h4>';
        list.forEach(function(cal, idx){
            html += '<div style="display:flex;justify-content:space-between;align-items:center;padding:12px 16px;background:#F3E9D0;border:1px solid rgba(51,38,40,0.08);border-radius:10px;margin-bottom:8px;">' +
                '<div><span style="color:#332628;font-size:14px;font-weight:600;">' + cal.label + '</span>' +
                '<span style="color:rgba(51,38,40,0.3);font-size:11px;margin-left:8px;">' + cal.days.length + ' days</span></div>' +
                '<div style="display:flex;gap:6px;">' +
                '<button onclick="wavesaiLoadSavedCal('+idx+')" style="background:rgba(248,24,148,0.1);color:#F81894;border:1px solid rgba(248,24,148,0.2);padding:6px 14px;border-radius:8px;cursor:pointer;font-size:11px;font-weight:600;font-family:inherit;">View</button>' +
                '<button onclick="wavesaiDownloadSavedCal('+idx+')" style="background:rgba(248,24,148,0.1);color:#F81894;border:1px solid rgba(248,24,148,0.2);padding:6px 14px;border-radius:8px;cursor:pointer;font-size:11px;font-weight:600;font-family:inherit;">Download</button>' +
                '<button onclick="wavesaiDeleteSavedCal('+idx+')" style="background:rgba(231,76,60,0.1);color:#e74c3c;border:1px solid rgba(231,76,60,0.2);padding:6px 10px;border-radius:8px;cursor:pointer;font-size:11px;font-family:inherit;">X</button>' +
                '</div></div>';
        });
        html += '</div>';
        savedDiv.innerHTML = html;
    }

    function loadLastCalendar(){
        var list = getSavedCalendars();
        var grid = document.getElementById('va-cal-grid');
        if(!list.length || !grid || grid.children.length > 0) return;
        // Auto-load the most recent saved calendar
        if(typeof vaRenderCalendar === 'function'){
            vaRenderCalendar(list[0].days);
        } else {
            // Render manually using the same format
            renderCalendarDays(grid, list[0].days);
        }
    }

    function renderCalendarDays(grid, days){
        var dayColors = { Monday:'#4a9eff', Tuesday:'#ff6b6b', Wednesday:'#ffd93d', Thursday:'#6bcb77', Friday:'#ff8a5c', Saturday:'#a78bfa', Sunday:'#f472b6' };
        var html = '';
        days.forEach(function(d){
            var col = dayColors[d.day] || '#F81894';
            html += '<div style="background:#F3E9D0;border:1px solid rgba(51,38,40,0.1);border-radius:14px;padding:20px;border-left:4px solid '+col+';">' +
                '<div style="margin-bottom:8px;"><strong style="color:'+col+';font-size:14px;">'+(d.day||'')+'</strong>' +
                '<span style="color:rgba(51,38,40,0.3);font-size:11px;margin-left:8px;">'+(d.best_time||'')+'</span>' +
                (d.content_type ? '<span style="background:rgba(248,24,148,0.1);color:#F81894;font-size:10px;font-weight:600;padding:2px 8px;border-radius:6px;margin-left:6px;">'+d.content_type+'</span>' : '') +
                '</div>' +
                '<div style="margin-bottom:8px;"><span style="color:#F81894;font-size:11px;font-weight:600;text-transform:uppercase;">Topic</span><p style="color:#332628;font-size:14px;font-weight:600;margin:3px 0 0;line-height:1.4;">'+(d.topic||'')+'</p></div>' +
                '<div style="margin-bottom:8px;"><span style="color:#F81894;font-size:11px;font-weight:600;text-transform:uppercase;">Hook</span><p style="color:rgba(51,38,40,0.75);font-size:14px;margin:3px 0 0;line-height:1.5;font-weight:700;">"'+(d.hook||'')+'"</p></div>' +
                (d.script ? '<div style="margin-bottom:8px;"><span style="color:#F81894;font-size:11px;font-weight:600;text-transform:uppercase;">Script</span><p style="color:rgba(51,38,40,0.6);font-size:12px;margin:3px 0 0;line-height:1.7;white-space:pre-line;">'+((d.script||'').replace(/</g,'&lt;'))+'</p></div>' : '') +
                '<div style="margin-bottom:8px;"><span style="color:#F81894;font-size:11px;font-weight:600;text-transform:uppercase;">Caption</span><p style="color:rgba(51,38,40,0.5);font-size:12px;margin:3px 0 0;line-height:1.6;">'+((d.caption||'').replace(/</g,'&lt;'))+'</p></div>' +
                '<div><span style="color:#F81894;font-size:11px;font-weight:600;text-transform:uppercase;">Hashtags</span><p style="color:rgba(248,24,148,0.7);font-size:11px;margin:3px 0 0;">'+(d.hashtags||'')+'</p></div>' +
                '</div>';
        });
        grid.innerHTML = html;
        var lastEl = document.getElementById('va-cal-last');
        if(lastEl) lastEl.style.display = 'block';
    }

    window.wavesaiLoadSavedCal = function(idx){
        var list = getSavedCalendars();
        if(!list[idx]) return;
        var grid = document.getElementById('va-cal-grid');
        if(!grid) return;
        if(typeof vaRenderCalendar === 'function'){
            vaRenderCalendar(list[idx].days);
        } else {
            renderCalendarDays(grid, list[idx].days);
        }
        var dateEl = document.getElementById('va-cal-date');
        if(dateEl) dateEl.textContent = 'Saved: ' + list[idx].label;
        // Make sure calendar panel is visible
        if(typeof vaTab === 'function') vaTab('calendar');
    };

    window.wavesaiDownloadSavedCal = function(idx){
        var list = getSavedCalendars();
        if(!list[idx]) return;
        var text = 'WEEKLY CONTENT CALENDAR\nGenerated by WavesAI Studio\n' + list[idx].label + '\n\n';
        list[idx].days.forEach(function(d){
            text += '=== ' + (d.day||'') + ' ===\n';
            text += 'Best Time: ' + (d.best_time||'') + '\n';
            text += 'Content Type: ' + (d.content_type||'') + '\n';
            text += 'Topic: ' + (d.topic||'') + '\n';
            text += 'Hook: ' + (d.hook||'') + '\n';
            if(d.script) text += 'Script: ' + d.script + '\n';
            text += 'Caption: ' + (d.caption||'') + '\n';
            text += 'Hashtags: ' + (d.hashtags||'') + '\n';
            if(d.video_prompt) text += 'Video Prompt: ' + d.video_prompt + '\n';
            text += '\n';
        });
        var blob = new Blob([text], {type:'text/plain'});
        var a = document.createElement('a');
        a.href = URL.createObjectURL(blob);
        a.download = 'content-calendar-' + list[idx].label.replace(/[^a-zA-Z0-9]/g,'-') + '.txt';
        a.click();
    };

    window.wavesaiDeleteSavedCal = function(idx){
        var list = getSavedCalendars();
        list.splice(idx, 1);
        localStorage.setItem(KEY, JSON.stringify(list));
        renderSavedList();
    };
})();
</script>
    <?php
}

// ─────────────────────────────────────────────────────────────────────────────
// 12. BRAIN / EXPERTISE SECTIONS ON EACH AGENT PAGE
// ─────────────────────────────────────────────────────────────────────────────
add_action( 'wp_footer', 'wavesai_polishing_brain_sections', 209 );
function wavesai_polishing_brain_sections() {
    ?>
<script id="wavesai-brain-sections">
(function(){
    var brainData = {
        'business-coach': {
            name: 'AI Business Coach',
            level: 'Expert Level',
            icon: '🧠',
            training: 'Trained on 50,000+ business case studies, startup frameworks, and growth strategies',
            experts: [
                'Harvard Business School case study methodology',
                'McKinsey & Company strategic frameworks (7S, Three Horizons)',
                'Y Combinator startup acceleration playbook',
                'Peter Drucker management principles',
                'Blue Ocean Strategy (Kim & Mauborgne)',
                'Lean Startup methodology (Eric Ries)',
                'OKR frameworks (John Doerr / Measure What Matters)'
            ],
            diff: 'Free ChatGPT gives generic advice. Our Business Coach has been specifically trained on proven business frameworks and gives structured, actionable plans tailored to YOUR business stage - startup, growth, or scale.'
        },
        'seo': {
            name: 'AI SEO Expert',
            level: 'Advanced Specialist',
            icon: '🔍',
            training: 'Trained on Google algorithm updates, ranking factors, and 10,000+ SEO audits',
            experts: [
                'Google Search Quality Evaluator Guidelines (175 pages)',
                'Google E-E-A-T framework (Experience, Expertise, Authoritativeness, Trust)',
                'Ahrefs & SEMrush ranking methodology',
                'Schema.org structured data specifications',
                'Core Web Vitals optimisation strategies',
                'Brian Dean (Backlinko) link building frameworks',
                'Technical SEO audit protocols (Screaming Frog methodology)'
            ],
            diff: 'Free AI knows SEO basics. Our SEO Expert is trained on the actual Google quality guidelines, understands every algorithm update since 2019, and analyses YOUR specific website to give targeted recommendations.'
        },
        'social-media': {
            name: 'AI Social Media Agent',
            level: 'Expert Level',
            icon: '📱',
            training: 'Trained on viral content patterns, platform algorithms, and engagement strategies across all major platforms',
            experts: [
                'Meta Business Suite advertising best practices',
                'TikTok Creator Academy growth strategies',
                'Instagram Reels algorithm optimisation',
                'Gary Vaynerchuk content marketing framework',
                'Viral content psychology (Jonah Berger - Contagious)',
                'Hook-based content creation methodology',
                'Platform-specific hashtag and timing strategies'
            ],
            diff: 'Free AI gives cookie-cutter social media tips. Our agent understands each platform\'s unique algorithm, creates content strategies based on YOUR niche, and generates ready-to-post content with hooks, captions, and hashtags optimised for engagement.'
        },
        'email': {
            name: 'AI Email Marketing Expert',
            level: 'Advanced Specialist',
            icon: '✉️',
            training: 'Trained on 25,000+ email campaigns, deliverability science, and conversion copywriting',
            experts: [
                'Russell Brunson (DotCom Secrets) funnel copywriting',
                'StoryBrand framework (Donald Miller)',
                'AIDA + PAS copywriting formulas',
                'Email deliverability protocols (SPF, DKIM, DMARC)',
                'A/B testing methodology for subject lines and CTAs',
                'Mailchimp & Klaviyo best practice playbooks',
                'Segmentation and automation sequence design'
            ],
            diff: 'Free AI writes generic emails. Our expert crafts high-converting sequences using proven copywriting frameworks, understands deliverability science, and builds automation funnels that nurture leads into customers.'
        },
        'content': {
            name: 'AI Content Writer',
            level: 'Expert Level',
            icon: '✍️',
            training: 'Trained on SEO copywriting, brand voice adaptation, and content strategy frameworks',
            experts: [
                'Ann Handley (Everybody Writes) content methodology',
                'Copyblogger content marketing framework',
                'SEO content optimisation (surfer SEO methodology)',
                'Brand voice development and tone consistency',
                'Long-form pillar content strategy',
                'Content repurposing frameworks (1 to 10 method)',
                'Readability optimisation (Flesch-Kincaid, Hemingway)'
            ],
            diff: 'Free AI writes bland, detectable AI content. Our writer is trained to match YOUR brand voice, optimise for SEO while keeping it human-readable, and create content strategies - not just individual pieces.'
        },
        'ads': {
            name: 'AI Ad Copywriter',
            level: 'Advanced Specialist',
            icon: '🎯',
            training: 'Trained on 100,000+ high-performing ads across Facebook, Google, TikTok, and Instagram',
            experts: [
                'Facebook Ads creative best practices (Meta Blueprint)',
                'Google Ads quality score optimisation',
                'David Ogilvy advertising principles',
                'Direct response copywriting (Claude Hopkins, Eugene Schwartz)',
                'UGC-style ad creation methodology',
                'ROAS optimisation and audience targeting strategies',
                'A/B split testing frameworks for creative and copy'
            ],
            diff: 'Free AI writes ads that look like AI wrote them. Our expert creates scroll-stopping ad copy using proven direct response frameworks, understands each platform\'s ad format requirements, and optimises for conversions not just clicks.'
        },
        'website': {
            name: 'AI Website Builder',
            level: 'Expert Level',
            icon: '🌐',
            training: 'Trained on UX/UI best practices, conversion rate optimisation, and modern web design patterns',
            experts: [
                'Nielsen Norman Group UX research principles',
                'Google Material Design guidelines',
                'Conversion rate optimisation (CRO) frameworks',
                'Mobile-first responsive design methodology',
                'Web accessibility standards (WCAG 2.1)',
                'Landing page optimisation (Unbounce methodology)',
                'Page speed and Core Web Vitals optimisation'
            ],
            diff: 'Free AI generates basic HTML. Our builder understands UX psychology, creates conversion-optimised layouts with proper visual hierarchy, and builds responsive sites that look professional on every device.'
        },
        'sales': {
            name: 'AI Sales Coach',
            level: 'Expert Level',
            icon: '💰',
            training: 'Trained on proven sales methodologies and negotiation frameworks from top sales organisations',
            experts: [
                'SPIN Selling methodology (Neil Rackham)',
                'Challenger Sale framework (Dixon & Adamson)',
                'Sandler Selling System',
                'Jordan Belfort persuasion techniques',
                'Objection handling frameworks (Chris Voss - Never Split the Difference)',
                'Solution selling and consultative sales approach',
                'Sales pipeline management and CRM best practices'
            ],
            diff: 'Free AI gives textbook sales advice. Our coach is trained on battle-tested methodologies used by Fortune 500 sales teams, helps you handle specific objections, and builds customised scripts for YOUR product and audience.'
        },
        'tiktok': {
            name: 'AI TikTok Expert',
            level: 'Advanced Specialist',
            icon: '🎵',
            training: 'Trained on TikTok algorithm mechanics, viral content patterns, and monetisation strategies',
            experts: [
                'TikTok Creator Academy official guidelines',
                'TikTok Shop selling strategies and product selection',
                'Viral hook frameworks (3-second rule methodology)',
                'TikTok SEO and hashtag optimisation',
                'Creator Fund and monetisation programme requirements',
                'Duet and Stitch engagement strategies',
                'Trending audio and transition techniques'
            ],
            diff: 'Free AI knows TikTok exists. Our expert understands the algorithm\'s ranking signals, knows which hooks stop the scroll, and gives you specific strategies for YOUR niche - not generic "post consistently" advice.'
        },
        'image': {
            name: 'AI Image Generator',
            level: 'Advanced Specialist',
            icon: '🎨',
            training: 'Powered by Leonardo AI with expert prompt engineering trained on 50,000+ successful generations',
            experts: [
                'Leonardo AI model-specific prompt optimisation',
                'Midjourney-style cinematic prompt engineering',
                'Photography composition rules (rule of thirds, golden ratio)',
                'Colour theory and professional colour grading',
                'Brand-consistent visual identity guidelines',
                'Product photography and e-commerce image standards',
                '8K ultra-realistic and artistic style parameters'
            ],
            diff: 'Free AI gives you a basic image generator. Our system includes a curated prompt library with 495+ expert prompts, understands camera settings, lighting, and composition - producing professional-grade visuals for your brand.'
        },
        'video': {
            name: 'AI Video Studio',
            level: 'Expert Level',
            icon: '🎬',
            training: 'Powered by Higgsfield AI with intelligent prompt optimisation for cinematic video generation',
            experts: [
                'Higgsfield AI video generation parameters',
                'Cinematic storytelling and shot composition',
                'Social media video format specifications (9:16, 16:9, 1:1)',
                'Motion design and transition principles',
                'Video ad creative best practices (Meta, TikTok, YouTube)',
                'Colour grading and visual mood creation',
                'Text overlay and thumbnail design methodology'
            ],
            diff: 'Free tools give you generic stock-looking clips. Our Video Studio uses Higgsfield AI with intelligently optimised prompts to create cinematic, scroll-stopping videos tailored to your brand and platform.'
        },
        'voice': {
            name: 'AI Voice Coach',
            level: 'Advanced Specialist',
            icon: '🎙️',
            training: 'Powered by HeyGen avatars and ElevenLabs voices with real-time conversation AI',
            experts: [
                'HeyGen avatar technology and lip-sync accuracy',
                'ElevenLabs voice cloning and synthesis',
                'Public speaking coaching methodology (Dale Carnegie)',
                'Presentation design (Nancy Duarte - Resonate)',
                'Pitch deck and investor presentation frameworks',
                'Voice modulation and persuasion techniques',
                'Interview preparation and confidence building'
            ],
            diff: 'Free AI gives text-based coaching. Our Voice Coach uses a real AI avatar that listens and responds in real-time, helping you practice pitches, presentations, and conversations with visual and verbal feedback.'
        }
    };

    function slugFromURL() {
        var path = window.location.pathname.toLowerCase();
        var map = {
            'business-suite': 'business-coach',
            'business-coach': 'business-coach',
            'seo-writer': 'seo',
            'seo-connector': 'seo',
            'embedded-seo': 'seo',
            'social-media': 'social-media',
            'viral-agent': 'social-media',
            'email-marketing': 'email',
            'content-writer': 'content',
            'creator-hub': 'content',
            'ugc-ads': 'ads',
            'website-builder': 'website',
            'master-tiktok': 'tiktok',
            'image-generator': 'image',
            'video-studio': 'video',
            'video-maker': 'video',
            'video-storyboard': 'video',
            'voice-coach': 'voice',
            'text-to-speech': 'voice',
            'agents': 'sales',
            'finances': 'sales'
        };
        for (var urlSlug in map) {
            if (path.indexOf(urlSlug) !== -1) return map[urlSlug];
        }
        return null;
    }

    function insertBrainSection() {
        var slug = slugFromURL();
        if (!slug || !brainData[slug]) return;
        if (document.getElementById('wavesai-brain-section')) return;

        var d = brainData[slug];
        var expertsList = d.experts.map(function(e){ return '<li style="padding:6px 0;border-bottom:1px solid rgba(248,24,148,0.08);color:rgba(243,233,208,0.85) !important;font-size:14px;line-height:1.5;">' + e + '</li>'; }).join('');

        var html = '<div id="wavesai-brain-section" style="margin:30px auto 20px;max-width:800px;padding:0 20px;">' +
            '<div style="background:linear-gradient(135deg,#332628 0%,#1a1214 100%) !important;border-radius:20px;padding:32px 28px;border:1px solid rgba(248,24,148,0.2);position:relative;overflow:hidden;">' +
                '<div style="position:absolute;top:-30px;right:-30px;width:120px;height:120px;background:radial-gradient(circle,rgba(248,24,148,0.15),transparent 70%);border-radius:50%;"></div>' +
                '<div style="display:flex;align-items:center;gap:12px;margin-bottom:20px;">' +
                    '<span style="font-size:32px;">' + d.icon + '</span>' +
                    '<div>' +
                        '<h3 style="color:#F3E9D0 !important;font-size:20px;margin:0 0 4px;font-weight:700;">The Brain Behind ' + d.name + '</h3>' +
                        '<span style="background:rgba(248,24,148,0.2) !important;color:#F81894 !important;font-size:12px;font-weight:700;padding:3px 12px;border-radius:20px;text-transform:uppercase;letter-spacing:1px;">' + d.level + '</span>' +
                    '</div>' +
                '</div>' +
                '<p style="color:rgba(243,233,208,0.8) !important;font-size:15px;line-height:1.6;margin:0 0 20px;">' + d.training + '</p>' +
                '<div style="background:rgba(243,233,208,0.06) !important;border-radius:14px;padding:20px;margin-bottom:20px;">' +
                    '<h4 style="color:#F81894 !important;font-size:14px;text-transform:uppercase;letter-spacing:1.5px;margin:0 0 14px;font-weight:700;">Expert Knowledge Embedded</h4>' +
                    '<ul style="list-style:none;margin:0;padding:0;">' + expertsList + '</ul>' +
                '</div>' +
                '<div style="background:rgba(248,24,148,0.08) !important;border-radius:14px;padding:18px 20px;border-left:3px solid #F81894;">' +
                    '<h4 style="color:#F81894 !important;font-size:13px;text-transform:uppercase;letter-spacing:1px;margin:0 0 8px;font-weight:700;">Why This Beats Free ChatGPT</h4>' +
                    '<p style="color:rgba(243,233,208,0.85) !important;font-size:14px;line-height:1.6;margin:0;">' + d.diff + '</p>' +
                '</div>' +
            '</div>' +
        '</div>';

        var targets = document.querySelectorAll('.wavesai-tool-container, .wavesai-coach-wrap, .wavesai-agent-wrap, [class*="wavesai"]');
        var inserted = false;
        for (var i = 0; i < targets.length; i++) {
            var t = targets[i];
            if (t.offsetHeight > 100) {
                t.insertAdjacentHTML('afterbegin', html);
                inserted = true;
                break;
            }
        }
        if (!inserted) {
            var main = document.querySelector('.entry-content, .page-content, main, #content, article');
            if (main) main.insertAdjacentHTML('afterbegin', html);
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function(){ setTimeout(insertBrainSection, 2000); });
    } else {
        setTimeout(insertBrainSection, 2000);
    }
})();
</script>
    <?php
}

// ─────────────────────────────────────────────────────────────────────────────
// 14. SMART MODE - AI PROMPT ENHANCEMENT (AJAX HANDLER)
// ─────────────────────────────────────────────────────────────────────────────
add_action( 'wp_ajax_wavesai_smart_enhance', 'wavesai_smart_enhance_handler' );
function wavesai_smart_enhance_handler() {
    if ( ! is_user_logged_in() ) wp_send_json_error( 'Not logged in' );
    $prompt = sanitize_textarea_field( $_POST['prompt'] ?? '' );
    $mode   = sanitize_text_field( $_POST['mode'] ?? 'enhance' );
    if ( empty( $prompt ) && $mode === 'enhance' ) wp_send_json_error( 'Empty prompt' );

    $api_key = get_option('wavesai_oai_key', '');
    if ( empty($api_key) ) {
        $api_key = base64_decode('c2stcHJvai0yOXcwNXZ2RlFMYWYzMG9KSm1ReGpnV19kX2VkLUtNeTdUQVFuUjZuZVQ2VkVCSWJSOTlCN05BUVBXanl4SlBFWldkUWp2MEN1OFQzQmxia0ZKSnd6aXYtWFRjUGN2OTRNQTU3ZmpGbEJFdVNQcFg1eHBreEYwd19wcUl4S1A3V29xOUNIMV84X3pTVE9qYTdtVlJGdmgwaWVUd0E=');
    }

    if ( $mode === 'enhance' ) {
        $system = 'You are an expert AI image prompt engineer. Take the user\'s simple image description and transform it into a detailed, professional prompt that will produce stunning results with AI image generators like Flux and Stable Diffusion. Add specific details about lighting, composition, style, mood, colors, and technical quality. Keep it under 200 words. Return ONLY the enhanced prompt text, nothing else.';
        $messages = [
            ['role' => 'system', 'content' => $system],
            ['role' => 'user', 'content' => 'Enhance this image prompt: ' . $prompt]
        ];
    } elseif ( $mode === 'quote' ) {
        $style = sanitize_text_field( $_POST['style'] ?? 'motivational' );
        $system = 'You are a motivational quote writer. Generate a short, powerful, original motivational quote (1-2 sentences max). Make it uplifting, memorable, and shareable on social media. Return ONLY the quote text, no attribution, no quotation marks.';
        $messages = [
            ['role' => 'system', 'content' => $system],
            ['role' => 'user', 'content' => 'Generate a ' . $style . ' motivational quote']
        ];
    } elseif ( $mode === 'quote_prompt' ) {
        $style = sanitize_text_field( $_POST['style'] ?? 'cute-animals' );
        $system = 'You are an expert AI image prompt engineer specialising in beautiful background scenes. Generate a detailed image prompt for a background scene that will have motivational text overlaid on it. The scene should be visually stunning, have areas of soft/blurred background suitable for text overlay, and match the requested style. Do NOT include any text in the image prompt. Keep under 150 words. Return ONLY the prompt.';
        $style_map = [
            'cute-animals' => 'An adorable fluffy kitten or puppy in a cozy setting with soft flowers, warm golden bokeh lighting, dreamy atmosphere',
            'nature' => 'A serene nature landscape with golden hour sunlight, wildflowers, rolling hills or peaceful lake, soft atmospheric haze',
            'ocean' => 'A tranquil ocean beach scene at sunset or sunrise, soft waves, pastel sky colors, calm and peaceful mood',
            'cozy' => 'A cozy indoor scene with soft blankets, candles, warm lighting, coffee cup, books, hygge atmosphere',
            'abstract' => 'A beautiful abstract gradient background with soft flowing shapes, dreamy pastel or jewel-tone colors, bokeh lights',
            'floral' => 'A gorgeous arrangement of fresh flowers in soft focus, roses and peonies, dewy petals, romantic warm lighting',
            'galaxy' => 'A stunning cosmic galaxy scene with nebula clouds, stars, deep space colors of purple blue and gold, ethereal',
            'vintage' => 'A warm vintage-style scene with sepia tones, old books, dried flowers, lace doilies, nostalgic cozy atmosphere'
        ];
        $base = $style_map[$style] ?? $style_map['cute-animals'];
        $messages = [
            ['role' => 'system', 'content' => $system],
            ['role' => 'user', 'content' => 'Create a background image prompt in this style: ' . $base . '. Make it unique and beautiful. Do not include any text or words in the image.']
        ];
    }

    $body = wp_json_encode([
        'model'       => 'gpt-4o-mini',
        'messages'    => $messages,
        'max_tokens'  => 300,
        'temperature' => 0.8,
    ]);

    $resp = wp_remote_post( 'https://api.openai.com/v1/chat/completions', [
        'headers' => [
            'Authorization' => 'Bearer ' . $api_key,
            'Content-Type'  => 'application/json',
        ],
        'body'    => $body,
        'timeout' => 30,
    ]);

    if ( is_wp_error( $resp ) ) wp_send_json_error( $resp->get_error_message() );
    $data = json_decode( wp_remote_retrieve_body( $resp ), true );
    $text = $data['choices'][0]['message']['content'] ?? '';
    if ( empty( $text ) ) wp_send_json_error( 'No response from AI' );
    wp_send_json_success( ['text' => trim( $text )] );
}

// ─────────────────────────────────────────────────────────────────────────────
// 14b. SMART MODE - FRONTEND JS
// ─────────────────────────────────────────────────────────────────────────────
add_action( 'wp_footer', 'wavesai_polishing_smart_mode', 210 );
function wavesai_polishing_smart_mode() {
    if ( strpos( $_SERVER['REQUEST_URI'], 'image-generator' ) === false ) return;
    ?>
<style id="wavesai-smart-mode-css">
.smart-mode-wrap {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 12px 0 4px;
}
.smart-toggle {
    position: relative;
    width: 48px;
    height: 26px;
    cursor: pointer;
}
.smart-toggle input { opacity: 0; width: 0; height: 0; }
.smart-slider {
    position: absolute;
    inset: 0;
    background: rgba(51,38,40,0.2);
    border-radius: 26px;
    transition: .3s;
}
.smart-slider:before {
    content: '';
    position: absolute;
    left: 3px;
    top: 3px;
    width: 20px;
    height: 20px;
    background: #fff;
    border-radius: 50%;
    transition: .3s;
}
.smart-toggle input:checked + .smart-slider {
    background: linear-gradient(135deg, #F81894, #9B30FF);
}
.smart-toggle input:checked + .smart-slider:before {
    transform: translateX(22px);
}
.smart-label {
    font-size: 14px;
    font-weight: 600;
    color: #332628;
    display: flex;
    align-items: center;
    gap: 6px;
}
.smart-badge {
    background: linear-gradient(135deg, #F81894, #9B30FF);
    color: #fff;
    font-size: 10px;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 10px;
    letter-spacing: 0.5px;
}
.smart-enhancing {
    display: none;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    background: linear-gradient(135deg, rgba(248,24,148,0.08), rgba(155,48,255,0.08));
    border-radius: 12px;
    margin: 8px 0;
    font-size: 13px;
    color: #332628;
}
.smart-enhancing .spin {
    width: 18px;
    height: 18px;
    border: 2px solid rgba(248,24,148,0.3);
    border-top-color: #F81894;
    border-radius: 50%;
    animation: smartSpin 0.8s linear infinite;
}
@keyframes smartSpin { to { transform: rotate(360deg); } }
.smart-enhanced-badge {
    display: none;
    font-size: 11px;
    color: #9B30FF;
    font-weight: 600;
    margin-top: 4px;
}
</style>
<script>
(function(){
    var tries = 0;
    function initSmartMode() {
        var prompt = document.getElementById('wavesai-prompt');
        var genBtn = document.getElementById('wavesai-generate-btn');
        if (!prompt || !genBtn) {
            if (++tries < 20) setTimeout(initSmartMode, 500);
            return;
        }

        // Insert Smart Mode toggle after the prompt
        var wrap = document.createElement('div');
        wrap.className = 'smart-mode-wrap';
        wrap.innerHTML = '<label class="smart-toggle"><input type="checkbox" id="smart-mode-cb"><span class="smart-slider"></span></label>' +
            '<span class="smart-label">Smart Mode <span class="smart-badge">AI</span></span>';
        prompt.parentElement.insertBefore(wrap, prompt.nextSibling);

        // Enhancing indicator
        var enhancing = document.createElement('div');
        enhancing.className = 'smart-enhancing';
        enhancing.id = 'smart-enhancing';
        enhancing.innerHTML = '<div class="spin"></div><span>AI is enhancing your prompt for better results...</span>';
        wrap.parentElement.insertBefore(enhancing, wrap.nextSibling);

        // Enhanced badge
        var badge = document.createElement('div');
        badge.className = 'smart-enhanced-badge';
        badge.id = 'smart-enhanced-badge';
        badge.textContent = 'Enhanced by Smart Mode AI';
        prompt.parentElement.insertBefore(badge, prompt.nextSibling);

        // Intercept generate button
        var origOnclick = genBtn.getAttribute('onclick');
        genBtn.removeAttribute('onclick');
        genBtn.addEventListener('click', function(e) {
            var cb = document.getElementById('smart-mode-cb');
            if (cb && cb.checked && prompt.value.trim().length > 0) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                enhancePrompt(prompt, function() {
                    if (origOnclick) {
                        new Function(origOnclick)();
                    }
                });
            } else {
                if (origOnclick) {
                    new Function(origOnclick)();
                }
            }
        });

        function enhancePrompt(promptEl, callback) {
            var el = document.getElementById('smart-enhancing');
            el.style.display = 'flex';
            genBtn.disabled = true;
            genBtn.style.opacity = '0.5';

            var fd = new FormData();
            fd.append('action', 'wavesai_smart_enhance');
            fd.append('prompt', promptEl.value);
            fd.append('mode', 'enhance');

            fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
                method: 'POST',
                body: fd
            })
            .then(function(r) { return r.json(); })
            .then(function(data) {
                el.style.display = 'none';
                genBtn.disabled = false;
                genBtn.style.opacity = '1';
                if (data.success && data.data && data.data.text) {
                    promptEl.value = data.data.text;
                    promptEl.dispatchEvent(new Event('input', {bubbles:true}));
                    var b = document.getElementById('smart-enhanced-badge');
                    b.style.display = 'block';
                    setTimeout(function(){ b.style.display = 'none'; }, 5000);
                }
                callback();
            })
            .catch(function() {
                el.style.display = 'none';
                genBtn.disabled = false;
                genBtn.style.opacity = '1';
                callback();
            });
        }
    }
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function(){ setTimeout(initSmartMode, 1500); });
    } else {
        setTimeout(initSmartMode, 1500);
    }
})();
</script>
    <?php
}

// ─────────────────────────────────────────────────────────────────────────────
// 15. MOTIVATIONAL QUOTE IMAGE GENERATOR
// ─────────────────────────────────────────────────────────────────────────────
add_action( 'wp_footer', 'wavesai_polishing_quote_generator', 211 );
function wavesai_polishing_quote_generator() {
    if ( strpos( $_SERVER['REQUEST_URI'], 'image-generator' ) === false ) return;
    ?>
<style id="wavesai-quote-gen-css">
#wavesai-quote-mode {
    display: none;
    padding: 20px 0;
}
#wavesai-quote-mode.active { display: block; }
.quote-gen-card {
    background: #332628;
    border-radius: 16px;
    padding: 28px;
    color: #F3E9D0;
}
.quote-gen-card h3 {
    font-size: 20px;
    font-weight: 700;
    margin: 0 0 4px;
    color: #F3E9D0;
}
.quote-gen-card .subtitle {
    font-size: 13px;
    color: rgba(243,233,208,0.6);
    margin: 0 0 20px;
}
.qg-field { margin-bottom: 18px; }
.qg-label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #F3E9D0;
    margin-bottom: 6px;
}
.qg-select, .qg-input {
    width: 100%;
    padding: 12px 16px;
    background: rgba(243,233,208,0.1);
    border: 1px solid rgba(243,233,208,0.15);
    border-radius: 10px;
    color: #F3E9D0;
    font-size: 14px;
    outline: none;
    transition: border-color .2s;
    box-sizing: border-box;
}
.qg-select:focus, .qg-input:focus {
    border-color: #F81894;
}
.qg-select option { background: #332628; color: #F3E9D0; }
.qg-textarea {
    width: 100%;
    padding: 12px 16px;
    background: rgba(243,233,208,0.1);
    border: 1px solid rgba(243,233,208,0.15);
    border-radius: 10px;
    color: #F3E9D0;
    font-size: 14px;
    min-height: 80px;
    resize: vertical;
    outline: none;
    font-family: inherit;
    box-sizing: border-box;
}
.qg-textarea:focus { border-color: #F81894; }
.qg-textarea::placeholder { color: rgba(243,233,208,0.4); }
.qg-row {
    display: flex;
    gap: 12px;
}
.qg-row > * { flex: 1; }
.qg-auto-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 16px;
    background: linear-gradient(135deg, #F81894, #9B30FF);
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    margin-top: 6px;
    transition: opacity .2s;
}
.qg-auto-btn:hover { opacity: 0.85; }
.qg-generate-btn {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, #F81894, #d4157e);
    color: #fff;
    border: none;
    border-radius: 12px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    margin-top: 8px;
    transition: opacity .2s;
}
.qg-generate-btn:hover { opacity: 0.9; }
.qg-generate-btn:disabled { opacity: 0.5; cursor: not-allowed; }
.qg-preview-area {
    display: none;
    margin-top: 20px;
    text-align: center;
}
.qg-preview-area canvas {
    max-width: 100%;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.3);
}
.qg-preview-actions {
    display: flex;
    gap: 10px;
    justify-content: center;
    margin-top: 14px;
}
.qg-dl-btn {
    padding: 10px 24px;
    background: #F81894;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
}
.qg-again-btn {
    padding: 10px 24px;
    background: rgba(243,233,208,0.15);
    color: #F3E9D0;
    border: 1px solid rgba(243,233,208,0.2);
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
}
.qg-status {
    display: none;
    align-items: center;
    gap: 10px;
    padding: 14px 18px;
    background: rgba(248,24,148,0.1);
    border-radius: 12px;
    margin-top: 14px;
    font-size: 13px;
    color: #F3E9D0;
}
.qg-status .spin {
    width: 18px;
    height: 18px;
    border: 2px solid rgba(248,24,148,0.3);
    border-top-color: #F81894;
    border-radius: 50%;
    animation: smartSpin 0.8s linear infinite;
    flex-shrink: 0;
}
.qg-font-row {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    margin-top: 6px;
}
.qg-font-opt {
    padding: 6px 14px;
    background: rgba(243,233,208,0.1);
    border: 1px solid rgba(243,233,208,0.15);
    border-radius: 8px;
    color: #F3E9D0;
    font-size: 12px;
    cursor: pointer;
    transition: all .2s;
}
.qg-font-opt.active {
    background: #F81894;
    border-color: #F81894;
    color: #fff;
}
@media (max-width: 768px) {
    .qg-row { flex-direction: column; gap: 0; }
    .quote-gen-card { padding: 20px 16px; }
}
</style>
<script>
(function(){
    var tries = 0;
    function initQuoteGen() {
        var modeBar = document.querySelector('.wavesai-img-mode-toggle');
        if (!modeBar) {
            if (++tries < 20) setTimeout(initQuoteGen, 500);
            return;
        }

        // Add Quote Gen mode button
        var qBtn = document.createElement('button');
        qBtn.id = 'mode-quotegen';
        qBtn.textContent = 'Quote Creator';
        qBtn.style.cssText = 'padding:10px 16px;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;border:1px solid rgba(51,38,40,0.2);background:#F3E9D0;color:#332628;transition:all .2s;';
        modeBar.appendChild(qBtn);
        modeBar.style.gridTemplateColumns = '1fr 1fr 1fr';

        // Create Quote Gen panel
        var panel = document.createElement('div');
        panel.id = 'wavesai-quote-mode';
        panel.innerHTML = '<div class="quote-gen-card">' +
            '<h3>Motivational Quote Creator</h3>' +
            '<p class="subtitle">Create beautiful motivational images with AI-generated backgrounds and your quotes</p>' +
            '<div class="qg-field"><label class="qg-label">Background Style</label>' +
                '<select class="qg-select" id="qg-style">' +
                    '<option value="cute-animals">Cute Animals</option>' +
                    '<option value="nature">Nature & Landscapes</option>' +
                    '<option value="ocean">Ocean & Beach</option>' +
                    '<option value="cozy">Cozy & Hygge</option>' +
                    '<option value="floral">Flowers & Roses</option>' +
                    '<option value="abstract">Abstract & Gradient</option>' +
                    '<option value="galaxy">Galaxy & Cosmic</option>' +
                    '<option value="vintage">Vintage & Nostalgic</option>' +
                '</select></div>' +
            '<div class="qg-field"><label class="qg-label">Your Quote</label>' +
                '<textarea class="qg-textarea" id="qg-quote" placeholder="Type your motivational quote here, or click Auto-Generate below..."></textarea>' +
                '<button class="qg-auto-btn" id="qg-auto-btn" type="button">&#10024; Auto-Generate Quote</button></div>' +
            '<div class="qg-field"><label class="qg-label">Text Style</label>' +
                '<div class="qg-font-row" id="qg-font-row">' +
                    '<button class="qg-font-opt active" data-font="elegant" type="button">Elegant</button>' +
                    '<button class="qg-font-opt" data-font="bold" type="button">Bold</button>' +
                    '<button class="qg-font-opt" data-font="handwritten" type="button">Handwritten</button>' +
                    '<button class="qg-font-opt" data-font="minimal" type="button">Minimal</button>' +
                '</div></div>' +
            '<div class="qg-row"><div class="qg-field"><label class="qg-label">Text Color</label>' +
                '<select class="qg-select" id="qg-text-color">' +
                    '<option value="#FFFFFF">White</option>' +
                    '<option value="#1a1a1a">Black</option>' +
                    '<option value="#F3E9D0">Cream</option>' +
                    '<option value="#F81894">Pink</option>' +
                    '<option value="#FFD700">Gold</option>' +
                '</select></div>' +
            '<div class="qg-field"><label class="qg-label">Image Size</label>' +
                '<select class="qg-select" id="qg-size">' +
                    '<option value="1:1">Square (1:1)</option>' +
                    '<option value="9:16">Portrait (9:16)</option>' +
                    '<option value="16:9">Landscape (16:9)</option>' +
                    '<option value="4:5">Instagram (4:5)</option>' +
                '</select></div></div>' +
            '<button class="qg-generate-btn" id="qg-generate-btn" type="button">Generate Quote Image</button>' +
            '<div class="qg-status" id="qg-status"><div class="spin"></div><span id="qg-status-text">Generating...</span></div>' +
            '<div class="qg-preview-area" id="qg-preview-area">' +
                '<canvas id="qg-canvas"></canvas>' +
                '<div class="qg-preview-actions">' +
                    '<button class="qg-dl-btn" id="qg-download-btn" type="button">Download Image</button>' +
                    '<button class="qg-again-btn" id="qg-again-btn" type="button">Generate Another</button>' +
                '</div></div>' +
        '</div>';

        // Insert panel after mode bar
        var toolApp = document.getElementById('wavesai-tool-app');
        if (toolApp) {
            toolApp.appendChild(panel);
        }

        // Load Google Fonts for text styles
        var link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Caveat:wght@600;700&family=Montserrat:wght@800;900&family=Raleway:wght@300;400&display=swap';
        document.head.appendChild(link);

        // Mode switching
        var allModes = ['mode-image','mode-pstudio','mode-img2prompt','mode-quotegen'];
        var allPanels = {
            'mode-image': null,
            'mode-pstudio': 'wavesai-pstudio-mode',
            'mode-img2prompt': 'wavesai-img2prompt-mode',
            'mode-quotegen': 'wavesai-quote-mode'
        };
        qBtn.addEventListener('click', function() {
            allModes.forEach(function(m) {
                var btn = document.getElementById(m);
                if (btn) {
                    btn.style.background = m === 'mode-quotegen' ? '#F81894' : '#F3E9D0';
                    btn.style.color = m === 'mode-quotegen' ? '#fff' : '#332628';
                    btn.style.borderColor = m === 'mode-quotegen' ? '#F81894' : 'rgba(51,38,40,0.2)';
                }
            });
            // Hide all panels
            var mainForm = document.querySelector('.wavesai-step-content');
            if (mainForm) mainForm.style.display = 'none';
            var pstudio = document.getElementById('wavesai-pstudio-mode');
            if (pstudio) pstudio.style.display = 'none';
            var img2p = document.getElementById('wavesai-img2prompt-mode');
            if (img2p) img2p.style.display = 'none';
            var promptgen = document.getElementById('wavesai-promptgen-mode');
            if (promptgen) promptgen.style.display = 'none';
            var productAd = document.getElementById('wavesai-product-ad-mode');
            if (productAd) productAd.style.display = 'none';
            var refMode = document.querySelector('[id*="reference-mode"], [id*="dual-mode"]');
            document.querySelectorAll('[id$="-mode"]').forEach(function(el) {
                if (el.id !== 'wavesai-quote-mode') el.style.display = 'none';
            });
            panel.classList.add('active');
            panel.style.display = 'block';
        });

        // Re-show main form when other mode buttons clicked
        ['mode-image'].forEach(function(mid) {
            var b = document.getElementById(mid);
            if (b) {
                b.addEventListener('click', function() {
                    panel.classList.remove('active');
                    panel.style.display = 'none';
                    qBtn.style.background = '#F3E9D0';
                    qBtn.style.color = '#332628';
                    qBtn.style.borderColor = 'rgba(51,38,40,0.2)';
                });
            }
        });

        // Font style selection
        document.getElementById('qg-font-row').addEventListener('click', function(e) {
            var opt = e.target.closest('.qg-font-opt');
            if (!opt) return;
            this.querySelectorAll('.qg-font-opt').forEach(function(o){ o.classList.remove('active'); });
            opt.classList.add('active');
        });

        // Auto-generate quote
        document.getElementById('qg-auto-btn').addEventListener('click', function() {
            var btn = this;
            var style = document.getElementById('qg-style').value;
            btn.disabled = true;
            btn.textContent = 'Generating...';
            var fd = new FormData();
            fd.append('action', 'wavesai_smart_enhance');
            fd.append('mode', 'quote');
            fd.append('style', style);
            fetch('<?php echo admin_url("admin-ajax.php"); ?>', { method: 'POST', body: fd })
            .then(function(r){ return r.json(); })
            .then(function(data){
                btn.disabled = false;
                btn.innerHTML = '&#10024; Auto-Generate Quote';
                if (data.success) {
                    document.getElementById('qg-quote').value = data.data.text;
                }
            }).catch(function(){
                btn.disabled = false;
                btn.innerHTML = '&#10024; Auto-Generate Quote';
            });
        });

        // Generate quote image
        document.getElementById('qg-generate-btn').addEventListener('click', function() {
            var quote = document.getElementById('qg-quote').value.trim();
            if (!quote) { alert('Please enter a quote or auto-generate one first.'); return; }
            generateQuoteImage(quote);
        });

        function generateQuoteImage(quote) {
            var genBtn = document.getElementById('qg-generate-btn');
            var status = document.getElementById('qg-status');
            var statusText = document.getElementById('qg-status-text');
            var preview = document.getElementById('qg-preview-area');
            genBtn.disabled = true;
            status.style.display = 'flex';
            preview.style.display = 'none';
            statusText.textContent = 'AI is creating your background...';

            var style = document.getElementById('qg-style').value;
            var size = document.getElementById('qg-size').value;

            // Step 1: Get AI prompt for background
            var fd = new FormData();
            fd.append('action', 'wavesai_smart_enhance');
            fd.append('mode', 'quote_prompt');
            fd.append('style', style);
            fetch('<?php echo admin_url("admin-ajax.php"); ?>', { method: 'POST', body: fd })
            .then(function(r){ return r.json(); })
            .then(function(data) {
                if (!data.success) throw new Error('Failed to generate prompt');
                var imgPrompt = data.data.text;
                statusText.textContent = 'Generating background image...';

                // Step 2: Use existing image generator to create background
                // Fill the main prompt and trigger generation via the existing API
                var mainPrompt = document.getElementById('wavesai-prompt');
                var mainSize = document.getElementById('wavesai-size');
                if (mainPrompt) mainPrompt.value = imgPrompt + ', no text, no words, no letters, no writing, clean background suitable for text overlay';
                if (mainSize) {
                    // Set size
                    for (var i = 0; i < mainSize.options.length; i++) {
                        if (mainSize.options[i].value === size || mainSize.options[i].textContent.includes(size)) {
                            mainSize.selectedIndex = i;
                            break;
                        }
                    }
                }
                // Set count to 1
                var mainCount = document.getElementById('wavesai-count');
                if (mainCount) mainCount.selectedIndex = 0;

                // Trigger generation and watch for result
                if (typeof wavesaiGenerateImage === 'function') {
                    wavesaiGenerateImage();
                    watchForResult(quote);
                } else {
                    statusText.textContent = 'Error: Image generator not available';
                    genBtn.disabled = false;
                }
            })
            .catch(function(err) {
                statusText.textContent = 'Error: ' + err.message;
                setTimeout(function(){ status.style.display = 'none'; genBtn.disabled = false; }, 3000);
            });
        }

        function watchForResult(quote) {
            var statusText = document.getElementById('qg-status-text');
            var checks = 0;
            var maxChecks = 60;
            var interval = setInterval(function() {
                checks++;
                if (checks > maxChecks) {
                    clearInterval(interval);
                    statusText.textContent = 'Timed out waiting for image. Please try again.';
                    document.getElementById('qg-generate-btn').disabled = false;
                    return;
                }
                // Look for generated image
                var imgs = document.querySelectorAll('.wavesai-generated-img, .wavesai-result img, #wavesai-result img, .wavesai-gallery img');
                var latestImg = null;
                imgs.forEach(function(img) {
                    if (img.src && img.src.startsWith('http') && img.naturalWidth > 0) {
                        latestImg = img;
                    }
                });
                if (!latestImg) {
                    // Also check for images in the result area
                    var resultArea = document.querySelector('.wavesai-results, #wavesai-results, .wavesai-gallery');
                    if (resultArea) {
                        var rImgs = resultArea.querySelectorAll('img');
                        rImgs.forEach(function(img) {
                            if (img.src && img.src.startsWith('http') && img.naturalWidth > 0) {
                                latestImg = img;
                            }
                        });
                    }
                }
                if (latestImg && latestImg.complete && latestImg.naturalWidth > 100) {
                    clearInterval(interval);
                    statusText.textContent = 'Composing your quote image...';
                    setTimeout(function() { composeQuoteImage(latestImg.src, quote); }, 500);
                }
            }, 2000);
        }

        function composeQuoteImage(bgUrl, quote) {
            var canvas = document.getElementById('qg-canvas');
            var ctx = canvas.getContext('2d');
            var preview = document.getElementById('qg-preview-area');
            var status = document.getElementById('qg-status');
            var genBtn = document.getElementById('qg-generate-btn');

            var img = new Image();
            img.crossOrigin = 'anonymous';
            img.onload = function() {
                canvas.width = img.width;
                canvas.height = img.height;
                ctx.drawImage(img, 0, 0);

                // Semi-transparent overlay for text readability
                ctx.fillStyle = 'rgba(0,0,0,0.3)';
                ctx.fillRect(0, 0, canvas.width, canvas.height);

                // Get text settings
                var textColor = document.getElementById('qg-text-color').value;
                var fontStyle = document.querySelector('.qg-font-opt.active');
                var fontKey = fontStyle ? fontStyle.dataset.font : 'elegant';

                var fontMap = {
                    'elegant': '"Playfair Display", Georgia, serif',
                    'bold': '"Montserrat", Arial, sans-serif',
                    'handwritten': '"Caveat", cursive',
                    'minimal': '"Raleway", Helvetica, sans-serif'
                };
                var fontWeightMap = {
                    'elegant': '700',
                    'bold': '900',
                    'handwritten': '700',
                    'minimal': '300'
                };

                var fontFamily = fontMap[fontKey] || fontMap['elegant'];
                var fontWeight = fontWeightMap[fontKey] || '700';

                // Calculate font size based on canvas size and text length
                var baseFontSize = Math.min(canvas.width, canvas.height) * 0.06;
                if (quote.length > 100) baseFontSize *= 0.75;
                if (quote.length > 150) baseFontSize *= 0.8;
                baseFontSize = Math.max(baseFontSize, 24);
                baseFontSize = Math.min(baseFontSize, 72);

                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';

                // Word wrap
                ctx.font = fontWeight + ' ' + baseFontSize + 'px ' + fontFamily;
                var maxWidth = canvas.width * 0.75;
                var lines = wrapText(ctx, quote, maxWidth);
                var lineHeight = baseFontSize * 1.4;
                var totalHeight = lines.length * lineHeight;
                var startY = (canvas.height - totalHeight) / 2 + lineHeight / 2;

                // Draw text shadow
                ctx.shadowColor = 'rgba(0,0,0,0.6)';
                ctx.shadowBlur = 15;
                ctx.shadowOffsetX = 2;
                ctx.shadowOffsetY = 2;
                ctx.fillStyle = textColor;

                lines.forEach(function(line, i) {
                    ctx.fillText(line, canvas.width / 2, startY + i * lineHeight);
                });

                // Reset shadow
                ctx.shadowColor = 'transparent';
                ctx.shadowBlur = 0;

                // Add subtle heart or decorative element below text
                if (fontKey === 'elegant' || fontKey === 'handwritten') {
                    ctx.font = Math.round(baseFontSize * 0.5) + 'px serif';
                    ctx.fillStyle = textColor;
                    ctx.globalAlpha = 0.7;
                    ctx.fillText('♥', canvas.width / 2, startY + lines.length * lineHeight + lineHeight * 0.4);
                    ctx.globalAlpha = 1;
                }

                preview.style.display = 'block';
                status.style.display = 'none';
                genBtn.disabled = false;

                // Switch back to quote gen panel view
                var qPanel = document.getElementById('wavesai-quote-mode');
                if (qPanel) {
                    qPanel.style.display = 'block';
                    qPanel.classList.add('active');
                }
            };
            img.onerror = function() {
                // If CORS fails, try drawing without crossOrigin
                var img2 = new Image();
                img2.onload = function() {
                    canvas.width = img2.width;
                    canvas.height = img2.height;
                    ctx.drawImage(img2, 0, 0);
                    ctx.fillStyle = 'rgba(0,0,0,0.3)';
                    ctx.fillRect(0, 0, canvas.width, canvas.height);

                    var textColor = document.getElementById('qg-text-color').value;
                    var fontStyle = document.querySelector('.qg-font-opt.active');
                    var fontKey = fontStyle ? fontStyle.dataset.font : 'elegant';
                    var fontMap = {
                        'elegant': '"Playfair Display", Georgia, serif',
                        'bold': '"Montserrat", Arial, sans-serif',
                        'handwritten': '"Caveat", cursive',
                        'minimal': '"Raleway", Helvetica, sans-serif'
                    };
                    var fontWeight = fontKey === 'bold' ? '900' : fontKey === 'minimal' ? '300' : '700';
                    var fontFamily = fontMap[fontKey] || fontMap['elegant'];
                    var baseFontSize = Math.min(canvas.width, canvas.height) * 0.06;
                    if (quote.length > 100) baseFontSize *= 0.75;
                    baseFontSize = Math.max(baseFontSize, 24);
                    baseFontSize = Math.min(baseFontSize, 72);
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'middle';
                    ctx.font = fontWeight + ' ' + baseFontSize + 'px ' + fontFamily;
                    var maxWidth = canvas.width * 0.75;
                    var lines = wrapText(ctx, quote, maxWidth);
                    var lineHeight = baseFontSize * 1.4;
                    var startY = (canvas.height - lines.length * lineHeight) / 2 + lineHeight / 2;
                    ctx.shadowColor = 'rgba(0,0,0,0.6)';
                    ctx.shadowBlur = 15;
                    ctx.fillStyle = textColor;
                    lines.forEach(function(line, i) {
                        ctx.fillText(line, canvas.width / 2, startY + i * lineHeight);
                    });
                    preview.style.display = 'block';
                    status.style.display = 'none';
                    genBtn.disabled = false;
                };
                img2.src = bgUrl;
            };
            img.src = bgUrl;
        }

        function wrapText(ctx, text, maxWidth) {
            var words = text.split(' ');
            var lines = [];
            var currentLine = '';
            words.forEach(function(word) {
                var testLine = currentLine ? currentLine + ' ' + word : word;
                if (ctx.measureText(testLine).width > maxWidth && currentLine) {
                    lines.push(currentLine);
                    currentLine = word;
                } else {
                    currentLine = testLine;
                }
            });
            if (currentLine) lines.push(currentLine);
            return lines;
        }

        // Download
        document.getElementById('qg-download-btn').addEventListener('click', function() {
            var canvas = document.getElementById('qg-canvas');
            try {
                var link = document.createElement('a');
                link.download = 'wavesai-quote-' + Date.now() + '.png';
                link.href = canvas.toDataURL('image/png');
                link.click();
            } catch(e) {
                alert('Download not available due to image security restrictions. Try right-clicking the image to save it.');
            }
        });

        // Generate another
        document.getElementById('qg-again-btn').addEventListener('click', function() {
            document.getElementById('qg-preview-area').style.display = 'none';
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function(){ setTimeout(initQuoteGen, 2000); });
    } else {
        setTimeout(initQuoteGen, 2000);
    }
})();
</script>
    <?php
}

// ─────────────────────────────────────────────────────────────────────────────
// 13. TERMS & CONDITIONS - PRICE/CREDIT CHANGE CLAUSE
// ─────────────────────────────────────────────────────────────────────────────
add_action( 'wp_footer', 'wavesai_polishing_terms_clause', 210 );
function wavesai_polishing_terms_clause() {
    if ( strpos( $_SERVER['REQUEST_URI'], 'terms' ) === false &&
         strpos( $_SERVER['REQUEST_URI'], 'legal' ) === false &&
         strpos( $_SERVER['REQUEST_URI'], 'conditions' ) === false &&
         strpos( $_SERVER['REQUEST_URI'], 'policy' ) === false &&
         strpos( $_SERVER['REQUEST_URI'], 'privacy' ) === false ) return;
    ?>
<script>
(function(){
    setTimeout(function(){
        var clause = '<div style="margin:24px 0;padding:20px;background:rgba(248,24,148,0.05);border-left:3px solid #F81894;border-radius:8px;">' +
            '<h4 style="color:#332628;font-size:16px;margin:0 0 8px;font-weight:700;">Pricing & Credits</h4>' +
            '<p style="color:rgba(51,38,40,0.8);font-size:14px;line-height:1.6;margin:0;">We reserve the right to change prices and charge higher credits at any time. Users will be notified of any pricing changes via email or on-platform notification. Continued use of the platform after pricing changes constitutes acceptance of the new pricing terms.</p>' +
        '</div>';
        var content = document.querySelector('.entry-content, .page-content, article .content, main');
        if (content) {
            content.insertAdjacentHTML('beforeend', clause);
        }
    }, 1500);
})();
</script>
    <?php
}

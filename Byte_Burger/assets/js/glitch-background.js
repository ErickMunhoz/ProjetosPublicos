/* ===========================================================
   GLITCH TEXT EFFECT BOOSTER
   (Para gerar pequenos "glitches" randômicos no texto)
   =========================================================== */

document.addEventListener("DOMContentLoaded", () => {
    const glitchTexts = document.querySelectorAll('.glitch-text');

    glitchTexts.forEach(glitch => {
        setInterval(() => {
            // randomiza pequenas transformações
            const rand = Math.random();

            glitch.style.transform = `skew(${(rand * 4 - 2).toFixed(1)}deg)`;

            glitch.style.textShadow = `
                ${rand * 4}px 0 rgba(255,0,0,0.6),
                -${rand * 4}px 0 rgba(0,0,255,0.6)
            `;
        }, 80); // velocidade do glitch
    });
});
/* ===========================================================
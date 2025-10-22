document.addEventListener('DOMContentLoaded', () => {
    const popup = document.getElementById('popup');

    popup.addEventListener('click', (e) => {
        if (e.target === popup) {
            popup.style.display = 'none';
        }
    });

    const teams = document.querySelectorAll('.team');

    teams.forEach(team => {
        team.addEventListener('click', async () => {
            const team_name = team.dataset.team;
            const response = await fetch('popup_content.php?team=' + team_name);
            const html = await response.text();
            popup.innerHTML = html;

            const closePopup = document.getElementById('closePopup');
            closePopup.addEventListener('click', () => {
                popup.style.display = 'none';
            });

            popup.style.display = 'flex';
        });
    });
})

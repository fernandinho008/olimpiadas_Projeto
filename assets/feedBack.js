function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('open');
}

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('reviewForm');
    const stars = document.getElementById('stars');
    const ratingInput = document.getElementById('rating');
    const reviewsContainer = document.getElementById('reviews');
    let selectedRating = 0;

    stars.addEventListener('click', (event) => {
        if (event.target.dataset.value) {
            selectedRating = parseInt(event.target.dataset.value);
            ratingInput.value = selectedRating;
            [...stars.children].forEach(star => {
                star.classList.toggle('selected', parseInt(star.dataset.value) <= selectedRating);
            });
        }
    });

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        
        const name = document.getElementById('name').value;
        const comment = document.getElementById('comment').value;

        const review = document.createElement('div');
        review.classList.add('review');

        const starsDiv = document.createElement('div');
        starsDiv.classList.add('stars');
        for (let i = 1; i <= 5; i++) {
            const star = document.createElement('span');
            star.innerHTML = '&#9733;';
            if (i <= selectedRating) {
                star.classList.add('selected');
            }
            starsDiv.appendChild(star);
        }

        review.appendChild(starsDiv);
        review.innerHTML += `<p><strong>${name}</strong></p><p>${comment}</p>`;
        reviewsContainer.appendChild(review);

        form.reset();
        selectedRating = 0;
        ratingInput.value = '';
        [...stars.children].forEach(star => star.classList.remove('selected'));
    });
});

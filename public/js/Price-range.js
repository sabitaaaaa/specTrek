document.addEventListener('DOMContentLoaded', function () {
    const prices = [5000, 25000, 45000, 65000, 90000];
    const range = document.getElementById('priceRange');
    const display = document.getElementById('valueDisplay');

    range.addEventListener('input', async function () {
        const selectedPrice = prices[this.value];
        display.textContent = selectedPrice;

        try {
            const response = await fetch(`/api/treks-by-price?price=${selectedPrice}`);
            const treks = await response.json();

            const trekContainer = document.querySelector('.row.row-cols-1.row-cols-md-3.g-4');
            trekContainer.innerHTML = '';

            if (treks.length === 0) {
                trekContainer.innerHTML = '<p>No treks found for the selected price.</p>';
                return;
            }

            treks.forEach(trek => {
                trekContainer.innerHTML += `
                    <div class="col" data-price="${trek.price}">
                        <div class="card h-100">
                            <img src="/images/${trek.image}" alt="${trek.name}" style="height: 115px;">
                            <div class="card-body">
                                <h5 class="card-title">${trek.name}</h5>
                                <p class="card-text">Starts at NPR ${trek.price}</p>
                            </div>
                        </div>
                    </div>
                `;
            });
        } catch (error) {
            console.error('Error fetching treks:', error);
        }
    });

    // Trigger filtering on page load to show initial treks
    range.dispatchEvent(new Event('input'));
});

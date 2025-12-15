let lashList = [];

function initLashesServices() {
    console.log("Loading products...");
    getLashes();
}

async function getLashes() {
    try {
        const lashesSets = await fetchData(
            "/nua-esthetique/public/assets/json/lashList.json"
        );
        console.log(lashesSets);

        parseLashes(lashesSets);
        lashList = lashesSets;
    } catch (error) {
        console.error(error);
    }
}

function parseLashes(lashes) {
    console.log(lashes, "input");

    lashList = [...lashes.lashes];
    console.log(lashes);
    console.log(lashes.lashes);

    const lashCards = document.getElementById("services-catalog-lashes");
    lashCards.classList.add("row", "justify-content-evenly", "flex-wrap");

    lashes.lashes.forEach((lashSet) => {
        const lashCard = document.createElement("div");
        lashCard.classList.add(
            "col-8",
            "card",
            "col-sm-6",
            "col-md-4",
            "col-lg-3",
            "m-2",
            "p-2",
            "text-center",
            "shadow-sm",
            "rounded"
        );
        lashCard.innerHTML = `
          <img src="${lashSet.lashImage}" class="card-img-top" alt="${lashSet.lashName}" style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title">${lashSet.lashName}</h5>
            </div> `;

        lashCards.appendChild(lashCard);
    });
}

async function fetchData(resourceURI) {
    try {
        const response = await fetch(resourceURI);
        console.log(response);

        const data = await response.json();
        return data;
    } catch (error) {
        throw error;
    }
}

document.addEventListener("DOMContentLoaded", initLashesServices);
// const docPage = document.querySelector("[data-page]");

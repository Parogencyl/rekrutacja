var categoriesId = [];
var categoriesName = [];

function setCategories(category, categoriesArray) {
    var categoryLength = categoriesId.length;
    if (categoryLength != 0) {
        var isSet = false;
        for (let i = 0; i < categoryLength; i++) {
            if (categoriesId[i] == category) {
                isSet = true;
                break;
            }
        }
        if (!isSet) {
            categoriesId.push(category);
            categoriesName.push(categoriesArray);
            updateCategoriesDiv(categoriesName, category);
        }
    } else {
        categoriesId.push(category);
        categoriesName.push(categoriesArray);
        updateCategoriesDiv(categoriesName, category);
    }

    document.getElementById("categoriesArray").value = categoriesId;
}

function updateCategoriesDiv(categories, category) {
    for (let i = 0; i < categories[0].length; i++) {
        if (categories[0][i]["id"] == category) {
            document.getElementById("allCategories").innerHTML +=
                "<div class='btn btn-warning btn mx-2'>" +
                categories[0][i]["name"] +
                "</div>";
        }
    }
}
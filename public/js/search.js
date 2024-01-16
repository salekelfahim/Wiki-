document.addEventListener("DOMContentLoaded", function () {
    var searchTitleInput = document.getElementById("search_title");
    var searchResultContainer = document.getElementById("search_result");

    searchTitleInput.addEventListener("keyup", function () {
        var title = searchTitleInput.value;

        if (title !== "") {
            $.ajax({
                type: 'GET',
                url: '/search', 
                data: { title: title },
                success: function (data) {
                    searchResultContainer.innerHTML=data;
                },
                error: function (error) {
                    console.error("Error during search:", error);
                }
            });
        } else {
            $.ajax({
                type: 'GET',
                url: '/search', 
                data: { title: title },
                success: function (data) {
                    searchResultContainer.innerHTML=data;
                },
                error: function (error) {
                    console.error("Error during search:", error);
                }
            });
        }
    });
});
function showDareList(userId) {
    var dareCountSpan = document.getElementById('dare-count-' + userId);
    var dareListDiv = document.getElementById('dare-list-' + userId);
    if (dareListDiv.style.display == 'none') {
        dareCountSpan.style.display = 'none';
        dareListDiv.style.display = 'block';
    } else {
        dareCountSpan.style.display = 'inline';
        dareListDiv.style.display = 'none';
    }
}

function showDareList2(userId) {
    var dareCountSpan = document.getElementById('dare-count2-' + userId);
    var dareListDiv = document.getElementById('dare-list2-' + userId);
    if (dareListDiv.style.display == 'none') {
        dareCountSpan.style.display = 'none';
        dareListDiv.style.display = 'block';
    } else {
        dareCountSpan.style.display = 'inline';
        dareListDiv.style.display = 'none';
    }
}


function profileFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

document.getElementById('search').addEventListener('keyup', (e) => {
    const value = e.target.value.toUpperCase();
    for (var student = 0; student < document.getElementsByClassName('even-row').length; student++) {
        if (document.getElementsByClassName('even-row')[student].innerHTML.toUpperCase().indexOf(value) > -1) {
            document.getElementsByClassName("even-row")[student].style.display = "";
        } else {
            document.getElementsByClassName("even-row")[student].style.display = "none";
        }
    }
    for (var student = 0; student < document.getElementsByClassName('odd-row').length; student++) {
        if (document.getElementsByClassName('odd-row')[student].innerHTML.toUpperCase().indexOf(value) > -1) {
            document.getElementsByClassName("odd-row")[student].style.display = "";
        } else {
            document.getElementsByClassName("odd-row")[student].style.display = "none";
        }
    }
})

function Cancel() {
    document.getElementById('myModal').style.display = 'none';
    document.getElementById('black-overlay1').style.display = 'none';
}

function cancel() {
    document.getElementById('myModal1').style.display = 'none';
    document.getElementById('black-overlay1').style.display = 'none';
}

function deleteButton(rollNumber) {
    document.getElementById('myModal').style.display = 'block';
    document.getElementById('black-overlay1').style.display = 'block';
    document.getElementById('caccept').addEventListener("click", () => {
        $.ajax({
            url : "PHP/PROFILE/deleteStudent.php",
            type : "post",
            data : {"rollNumber" : rollNumber},
            success : function(res) {
                document.getElementById('myModal').style.display = 'none';
                document.getElementById('black-overlay1').style.display = 'none';
                window.location.reload();
            }
        })
    })
    
    document.getElementById('creject').addEventListener("click", () => {
        document.getElementById('myModal').style.display = 'none';
        document.getElementById('black-overlay1').style.display = 'none';
    })
}

function editButton(rollNumber) {
    $.ajax({
        url : "PHP/PROFILE/editStudent.php",
        type : "post",
        data : {"rollNumber" : rollNumber},
        success : function(res) {
            document.getElementsByClassName('form-container')[0].innerHTML = res;
            document.getElementById('myModal1').style.display = 'block';
            document.getElementById('black-overlay1').style.display = 'block';
        }
    })
}

function adminFilter() {
    var select = document.getElementsByName('department')[0];
    var department = select.options[select.selectedIndex].value;
    var select = document.getElementsByName('section')[0];
    var section = select.options[select.selectedIndex].value;
    var select = document.getElementsByName('semester')[0];
    var semester = select.options[select.selectedIndex].value;
    
    $.ajax({
        url : "PHP/PROFILE/filterStudentDetail.php",
        type : "post",
        data : {"id" : 1, "department" : department, "section" : section, "semester" : semester},
        success : function(res) {
            document.getElementsByClassName('detail-container1')[0].innerHTML = res;
            document.getElementsByClassName('detail-container')[0].style.display = "none";
            document.getElementsByClassName('detail-container1')[0].style.display = "block";
        }
    })
}

function hodFilter() {
    var select = document.getElementsByName('section')[0];
    var section = select.options[select.selectedIndex].value;
    var select = document.getElementsByName('semester')[0];
    var semester = select.options[select.selectedIndex].value;
    
    $.ajax({
        url : "PHP/PROFILE/filterStudentDetail.php",
        type : "post",
        data : {"id" : 1, "section" : section, "semester" : semester},
        success : function(res) {
            document.getElementsByClassName('detail-container1')[0].innerHTML = res;
            document.getElementsByClassName('detail-container')[0].style.display = "none";
            document.getElementsByClassName('detail-container1')[0].style.display = "block";
        }
    })
}
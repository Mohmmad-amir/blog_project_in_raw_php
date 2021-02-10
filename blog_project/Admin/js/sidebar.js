let collapseBtn = document.querySelector('#sidebar-collupse');
let sidebar = document.querySelector('#sidebar');
let mainSection = document.querySelector('#main');
let sidebarOpen = true;

let linkTexts = document.querySelectorAll('.link-text');


sidebar.style.height = innerHeight - 77 + 'px';
mainSection.style.height = innerHeight - 77 + 'px';

collapseBtn.addEventListener('click', function () {

    if (sidebarOpen == true) {
        collapseBtn.innerHTML = '&gt; &gt';
        sidebar.style.width = '5%';
        mainSection.style.width = "95%";

        for (let i = 0; i < linkTexts.length; i++) {
            linkTexts[i].style.display = 'none';
        }

        sidebarOpen = false;
    } else {
        collapseBtn.innerHTML = '&lt; &lt';
        sidebar.style.width = '18%';
        mainSection.style.width = "82%"

        setTimeout(function () {
            for (let i = 0; i < linkTexts.length; i++) {
                linkTexts[i].style.display = 'inline';
            }
        }, 230)




        sidebarOpen = true;
    }

});
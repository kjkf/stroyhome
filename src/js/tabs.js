function initTabs() {
    const tabs = document.querySelector('.tabs');
    const tabItem = tabs.querySelectorAll('.tabs__item');
    let activeTab = tabs.querySelector(".tabs__block.active");
    let activeTabItem = tabs.querySelector(".tabs__item.active");

    tabItem.forEach(function(tab){
        tab.addEventListener('click', function (e) {
            e.preventDefault();
            if (tab === activeTabItem) return;
            activeTabItem.classList.remove('active');
            tab.classList.add('active');
            activeTabItem = tab;

            const newActiveSelector = `#${tab.dataset.tab}`;

            const newActive = tabs.querySelector(newActiveSelector);

            activeTab.classList.remove('active');
            activeTab.classList.add('prev');
            setTimeout(function () {
                //console.log(activeTab);
                activeTab.classList.remove('prev');

                activeTab = newActive;
            }, 1000);
            newActive.classList.add('active');



        } )
    })
}
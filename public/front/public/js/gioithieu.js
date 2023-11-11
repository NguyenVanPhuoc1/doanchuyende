// Lắng nghe sự kiện cuộn của trang
document.addEventListener('DOMContentLoaded', function() {
    var banner = document.querySelector('.wrap-header-menu .menu');
    banner.classList.remove('fixed');
    window.addEventListener('scroll', function() {
        var scrollPosition = window.scrollY || window.pageYOffset;
    
        if (scrollPosition > 100) { // Thêm lớp chỉ khi chưa thêm và vị trí scroll đủ điều kiện
            banner.classList.add('fixed');
        } else if (scrollPosition <= 100 ) { // Loại bỏ lớp khi scroll lên đầu trang
            banner.classList.remove('fixed');
        }
    });
});

// Chờ tài liệu HTML được tải xong
document.addEventListener("DOMContentLoaded", function () {
    // Lấy tiêu đề trang
    var pageTitle = document.title;
    // alert(pageTitle);
    // Kiểm tra xem tiêu đề có chứa từ khóa "tin tức" không
    if (pageTitle.includes("Tin Tức")) {
        // Nếu có, thêm/xóa lớp khỏi thẻ body
        document.body.classList.remove("body");
    }
}); 

const backToTopBtn = document.querySelector('.scrollToTop');
    window.addEventListener("scroll", () => {
        if (window.scrollY > 200) {
            backToTopBtn.classList.add("show");
        } else {
            backToTopBtn.classList.remove("show");
        }
    });

    backToTopBtn.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
});


// chuyển tab

    const tabs = document.querySelectorAll('.tab-nav li');
    const tabContents = document.querySelectorAll('.tab-pane');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                tab.classList.add('active');
                const tabId = tab.querySelector('a').getAttribute('href').substring(1);
                const tabContent = document.getElementById(tabId);
                tabContent.classList.add('active');
            });
        });

        // Set the initial active tab
        tabs[0].click();


 
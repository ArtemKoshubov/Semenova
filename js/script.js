 document.getElementById('contact-button').addEventListener('click', function() {
        var callbackForm = document.getElementById('callback-form');
        // Переключаем видимость формы
        if (callbackForm.style.display === 'none' || callbackForm.style.display === '') {
            callbackForm.style.display = 'block'; // Показываем форму
        } else {
            callbackForm.style.display = 'none'; // Скрываем форму
        }
    });

// Получаем кнопку
const scrollToTopBtn = document.getElementById("scrollToTopBtn");

// Показываем кнопку при прокрутке вниз
window.onscroll = function() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        scrollToTopBtn.style.display = "block";
    } else {
        scrollToTopBtn.style.display = "none";
    }
};

// Прокручиваем страницу вверх при нажатии на кнопку
scrollToTopBtn.onclick = function() {
    window.scrollTo({
        top: 0,
        behavior: "smooth" // Плавная прокрутка
    });
};
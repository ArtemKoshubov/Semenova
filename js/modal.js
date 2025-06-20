document.addEventListener('DOMContentLoaded', function() {
    const bookingButtons = document.querySelectorAll('.btn-book');
    const modal = document.getElementById('bookingModal');
    const closeModal = document.getElementById('closeModal');
    const modalServiceTitle = document.getElementById('modalServiceTitle');
    const modalServiceDescription = document.getElementById('modalServiceDescription');
    const modalServicePrice = document.getElementById('modalServicePrice');
    const bookingForm = document.getElementById('bookingForm');

    bookingButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            modalServiceTitle.textContent = button.getAttribute('data-title');
            modalServiceDescription.textContent = button.getAttribute('data-description');
            modalServicePrice.textContent = button.getAttribute('data-price');
            modal.style.display = 'block';
        });
    });

    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

    bookingForm.addEventListener('submit', function(event) {
        event.preventDefault();
        alert('Запись успешно отправлена!');
        modal.style.display = 'none';
        bookingForm.reset();
    });
});



document.addEventListener('DOMContentLoaded', function() {
    // Открытие модального окна
    document.querySelectorAll('.btn-book').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Получаем данные из атрибутов
            const serviceId = this.getAttribute('data-id');
            const title = this.getAttribute('data-title');
            const description = this.getAttribute('data-description');
            const price = this.getAttribute('data-price');
            
            // Заполняем модальное окно
            document.getElementById('modalServiceTitle').textContent = title;
            document.getElementById('modalServiceDescription').textContent = description;
            document.getElementById('modalServicePrice').textContent = 'Цена: ' + price;
            document.getElementById('serviceId').value = serviceId;
            
            // Показываем модальное окно
            document.getElementById('bookingModal').style.display = 'block';
        });
    });
    
    // Закрытие модального окна
    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('bookingModal').style.display = 'none';
    });
    
    // Закрытие при клике вне окна
    window.addEventListener('click', function(e) {
        if (e.target === document.getElementById('bookingModal')) {
            document.getElementById('bookingModal').style.display = 'none';
        }
    });
});
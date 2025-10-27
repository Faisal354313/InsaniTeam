​​​​​​​
​​<div style="bottom:0;background: url('foto/bgbawah.webp');width: 100%;height: 100px;background-size: 100% 100%;">
</div>
<div class="container-fluid bg-dark text-light footer" data-wow-delay="0.1s" style="background: linear-gradient(to right, #0d47a1, #1976d2);">
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Dibuat Oleh</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="index.php">Home</a>
                        <a href="login.php">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Floating Chat Button -->
<!-- Tombol Chat (floating) -->
<!-- Floating Chat Button (KIRI BAWAH) -->
<!-- Tombol Chat (Kanan Bawah) -->
<button id="toggleChatbot" style="
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #1976d2;
    border: none;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    z-index: 9999;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0;
">
    <img src="foto/logochatbot.png" alt="Chatbot" style="width: 60%; height: 60%;">
</button>


<!-- Chatbot Modal (DI SEBELAH KIRI TOMBOL CHAT) -->
<div id="chatbotModal" style="
    display: none;
    position: fixed;
    bottom: 20px;
    right: 90px;
    width: 350px;
    height: 500px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    z-index: 9999;
    overflow: hidden;
">



    <div style="background: linear-gradient(to right, #0d47a1, #1976d2); color: white; padding: 10px; text-align: center; position: relative;">
        Nawasena
        <button onclick="closeChatbot()" style="position:absolute; right:10px; top:6px; background:none; border:none; color:white; font-size:16px;">✖</button>
    </div>
    <div id="chatMessages" style="flex:1; padding: 10px; overflow-y: auto; font-size: 14px;"></div>
    <form id="chatForm" style="display:flex; border-top:1px solid #ccc;">
        <input type="text" id="chatInput" placeholder="Ketik pesan..." style="flex:1; padding:10px; border:none;">
        <button type="submit" style="background-color:#1976d2; color:white; border:none; padding:10px;">Kirim</button>
    </form>
</div>


<!-- <a href="#" style="background-color: #0624cc;" class="btn btn-lg btn-lg-square back-to-top text-white"><i class="bi bi-arrow-up"></i></a> -->


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets_home/lib/wow/wow.min.js"></script>
<script src="assets_home/lib/easing/easing.min.js"></script>
<script src="assets_home/lib/waypoints/waypoints.min.js"></script>
<script src="assets_home/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="assets_home/js/main.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabel').DataTable();
    });
</script>
<script>
    const toggleChatbot = document.getElementById('toggleChatbot');
    const chatbotModal = document.getElementById('chatbotModal');
    const chatMessages = document.getElementById('chatMessages');
    const chatForm = document.getElementById('chatForm');
    const chatInput = document.getElementById('chatInput');

    toggleChatbot.onclick = function() {
        chatbotModal.style.display = chatbotModal.style.display === 'none' ? 'flex' : 'none';
    };

    function closeChatbot() {
        chatbotModal.style.display = 'none';
    }

    // Muat riwayat chat dari server saat awal buka modal
    fetch('chat_history.php')
        .then(res => res.json())
        .then(data => {
            data.forEach(row => {
                chatMessages.innerHTML += `<div><br><b>Anda:<br></b> ${row.user}</div>`;
                chatMessages.innerHTML += `<div><br><b>Nawasena:<br></b> ${row.bot}<br></div>`;
            });
            chatMessages.scrollTop = chatMessages.scrollHeight;
        });


    chatForm.onsubmit = async function(e) {
        e.preventDefault();
        const userText = chatInput.value.trim();
        if (!userText) return;

        chatMessages.innerHTML += `<div><br><b>Anda:</b> ${userText}</div>`;
        chatInput.value = '';
        chatMessages.scrollTop = chatMessages.scrollHeight;

        const response = await fetch('chatbot.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'message=' + encodeURIComponent(userText)
        });

        const data = await response.json();
        chatMessages.innerHTML += `<div><br><b>Nawasena:<br></b> ${data.response}</div>`;
        chatMessages.scrollTop = chatMessages.scrollHeight;
    };
</script>


</body>

</html>
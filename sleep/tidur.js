function createStars() {
    const body = document.body;
    for (let i = 0; i < 50; i++) {
        const star = document.createElement('div');
        star.classList.add('star');
        star.style.left = `${Math.random() * 100}%`;
        star.style.top = `${Math.random() * 100}%`;
        star.style.width = `${Math.random() * 3}px`;
        star.style.height = star.style.width;
        star.style.animationDelay = `${Math.random() * 2}s`;
        body.appendChild(star);
    }
}

createStars();

const steps = document.querySelectorAll('.form-step');
const progressSteps = document.querySelectorAll('.progress-step');
let currentStep = 0;

function updateStepDisplay() {
    steps.forEach((step, index) => {
        step.classList.toggle('active', index === currentStep);
        progressSteps[index].classList.toggle('active', index <= currentStep);
    });
}

document.querySelectorAll('.btn-next').forEach(button => {
    button.addEventListener('click', () => {
        const currentStepElement = steps[currentStep];
        const requiredInputs = currentStepElement.querySelectorAll('[required]');
        let isValid = true;

        requiredInputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.style.borderColor = 'red';
            } else {
                input.style.borderColor = 'var(--accent-color)';
            }
        });

        if (isValid) {
            currentStep++;
            updateStepDisplay();
        }
    });
});

document.querySelectorAll('.btn-prev').forEach(button => {
    button.addEventListener('click', () => {
        currentStep--;
        updateStepDisplay();
    });
});

document.getElementById('sleepForm').addEventListener('submit', function(e) {
    e.preventDefault();
    hitungKualitasTidur();
});

function hitungKualitasTidur() {
    // Ambil semua input
    const umur = parseInt(document.getElementById('umur').value);
    const waktuTidurMalam = document.getElementById('waktuTidurMalam').value;
    const waktuBangunPagi = document.getElementById('waktuBangunPagi').value;
    const tidurSiang = document.getElementById('tidurSiang').value;
    const stres = document.getElementById('stres').value;
    const aktivitasFisik = document.getElementById('aktivitasFisik').value;
    const kafein = document.getElementById('kafein').value;
    const lingkunganTidur = document.getElementById('lingkunganTidur').value;

    // Algoritma Hitung Durasi Tidur
    const tidur = new Date(`2023-01-01 ${waktuTidurMalam}`);
    const bangun = new Date(`2023-01-01 ${waktuBangunPagi}`);
    let durasiTidur = (bangun - tidur) / (1000 * 60 * 60);
    if (durasiTidur < 0) durasiTidur += 24;

    // Algoritma Kualitas Tidur Super Kompleks
    let skorTidur = 0;
    let feedback = "";
    let emoji = "😴";
    let saran = [];

    // 1. Skor Durasi Tidur Berdasarkan Umur
    if (umur >= 13 && umur <= 17) {
        if (durasiTidur >= 8 && durasiTidur <= 10) skorTidur += 3;
        else if (durasiTidur >= 7 && durasiTidur < 8) skorTidur += 2;
        else skorTidur += 1;
    } else if (umur >= 18 && umur <= 25) {
        if (durasiTidur >= 7 && durasiTidur <= 9) skorTidur += 3;
        else if (durasiTidur >= 6 && durasiTidur < 7) skorTidur += 2;
        else skorTidur += 1;
    }

    // 2. Skor Tidur Siang
    switch(tidurSiang) {
        case "15-30": 
            skorTidur += 1; 
            saran.push("Tidur siang sebentar bagus buat refresh otak!");
            break;
        case "30-60": 
            skorTidur += 0.5; 
            saran.push("Hindari tidur siang terlalu lama ya!");
            break;
        case "60+": 
            skorTidur -= 1; 
            saran.push("Tidur siang kepanjangan bisa ganggu ritme tidur malammu!");
            break;
    }

    // 3. Skor Stres
    switch(stres) {
        case "rendah": 
            skorTidur += 2; 
            break;
        case "sedang": 
            skorTidur += 1; 
            saran.push("Coba meditasi atau breathing exercise buat kurangin stres!");
            break;
        case "tinggi": 
            skorTidur -= 1; 
            saran.push("Wajib banget kamu kurangin stres! Coba konseling atau aktivitas yang menenangkan.");
            break;
    }

    // 4. Skor Aktivitas Fisik
    switch(aktivitasFisik) {
        case "rendah": 
            skorTidur -= 1; 
            saran.push("Gerak dikit dong! Olahraga ringan bisa bantu kualitas tidurmu.");
            break;
        case "sedang": 
            skorTidur += 1; 
            break;
        case "tinggi": 
            skorTidur += 2; 
            saran.push("Keren! Aktifitas fisikmu bagus banget buat kualitas tidur!");
            break;
    }

    // 5. Skor Kafein
    switch(kafein) {
        case "rendah": 
            skorTidur += 2; 
            break;
        case "sedang": 
            skorTidur += 1; 
            saran.push("Kurangin konsumsi kafein, terutama jelang tidur!");
            break;
        case "tinggi": 
            skorTidur -= 1; 
            saran.push("Kafein kebanyakan bisa ganggu kualitas tidurmu! Coba batasi ya!");
            break;
    }

    // 6. Skor Lingkungan Tidur
    switch(lingkunganTidur) {
        case "bagus": 
            skorTidur += 2; 
            saran.push("Lingkungan tidurmu keren! Pertahankan!");
            break;
        case "sedang": 
            skorTidur += 1; 
            saran.push("Coba rapikan kamar biar makin nyaman!");
            break;
        case "buruk": 
            skorTidur -= 1; 
            saran.push("Benerin deh lingkungan tidurmu. Pastikan gelap, tenang, dan sejuk!");
            break;
    }

    // Generate Feedback Ultimate
    if (skorTidur >= 8) {
        feedback = "WOW! Kualitas tidurmu EPIC banget! 🌟 Kamu adalah master of sleep!";
        emoji = "🤩";
    } else if (skorTidur >= 5 && skorTidur < 8) {
        feedback = "Keren! Kualitas tidurmu makin mantul. Tinggal sedikit lagi perfect! 💪";
        emoji = "😎";
    } else if (skorTidur >= 3 && skorTidur < 5) {
        feedback = "Ada ruang buat improvement nih! Kamu bisa lebih baik lagi! 💤";
        emoji = "😴";
    } else {
        feedback = "Waktunya reset total pola tidurmu! Kamu bisa lebih baik dari ini! 🆘";
        emoji = "😓";
    }

    // Tampilkan Hasil
    document.getElementById('resultContainer').style.display = 'block';
    document.getElementById('saranContainer').style.display = 'block';
    document.getElementById('sleepEmoji').textContent = emoji;
    document.getElementById('hasilAnalisis').innerHTML = `
        <h3>Analisis Tidurmu:</h3>
        <p>Durasi Tidur: ${durasiTidur.toFixed(1)} jam</p>
        <p>Skor Kualitas Tidur: ${skorTidur.toFixed(1)}/10</p>
        <p>${feedback}</p>
    `;

    // Generate Saran
    const saranTidur = document.getElementById('saranTidur');
    saranTidur.innerHTML = saran.map((item, index) => 
        `<div class="saran-item">${index + 1}. ${item}</div>`
    ).join('');
}

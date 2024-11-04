<div class="container py-5 min-vh-100 d-flex align-items-center justify-content-center">
    <div class="text-center error-container">
        <img src="https://cdn-icons-png.flaticon.com/512/1076/1076928.png" alt="One Piece Logo" class="error-image">
        <div class="error-code">404</div>
        <div class="error-message">
            Oops! Looks like this page got lost in the Grand Line!
        </div>
        <a href="?page=home" class="back-button">
            <i class="fas fa-ship pirate-icon"></i>
            Back to Safe Waters
        </a>
    </div>
</div>

<style>
    .error-container {
        text-align: center;
        color: var(--light);
        padding: 2rem;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        max-width: 600px;
        width: 90%;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    .error-image {
        width: 200px;
        height: 200px;
        margin: 0 auto 2rem;
        animation: rotate 20s linear infinite;
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .error-code {
        font-size: 6rem;
        font-weight: 700;
        color: var(--secondary);
        text-shadow: 3px 3px 0 var(--primary);
        margin-bottom: 1rem;
        animation: glitch 1s linear infinite;
    }

    @keyframes glitch {

        2%,
        64% {
            transform: translate(2px, 0) skew(0deg);
        }

        4%,
        60% {
            transform: translate(-2px, 0) skew(0deg);
        }

        62% {
            transform: translate(0, 0) skew(5deg);
        }
    }

    .error-message {
        font-size: 1.5rem;
        margin-bottom: 2rem;
        color: var(--light);
    }

    .back-button {
        display: inline-block;
        padding: 1rem 2rem;
        background: linear-gradient(90deg, #D32F2F 0%, #B71C1C 100%);
        color: var(--secondary);
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: 2px solid var(--secondary);
    }

    .back-button:hover {
        transform: scale(1.05);
        background: var(--secondary);
        color: var(--primary);
        border-color: var(--primary);
        text-decoration: none;
    }

    .pirate-icon {
        font-size: 2rem;
        margin-right: 0.5rem;
    }

    @media (max-width: 768px) {
        .error-code {
            font-size: 4rem;
        }

        .error-message {
            font-size: 1.2rem;
        }

        .error-image {
            width: 150px;
            height: 150px;
        }
    }
</style>
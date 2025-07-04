<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Video Call</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #111 60%, #ff6a00 100%);
            color: #fff;
        }
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        header {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto 18px auto;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding: 32px 32px 0 32px;
            box-sizing: border-box;
        }
        .go-back {
            background: linear-gradient(90deg, #d7263d 60%, #a50021 100%);
            border: none;
            border-radius: 30px;
            padding: 10px 28px;
            font-size: 1rem;
            font-weight: 700;
            color: #fff;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(215, 38, 61, 0.4);
            transition: background 0.3s, transform 0.2s;
            letter-spacing: 1px;
        }
        .go-back:hover {
            background: linear-gradient(90deg, #a50021 60%, #d7263d 100%);
            transform: translateY(-3px) scale(1.05);
        }
        .video-container {
            flex: 1 1 auto;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto 32px auto;
            background: rgba(20, 20, 20, 0.95);
            border-radius: 18px;
            box-shadow: 0 12px 40px rgba(255, 106, 0, 0.2);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        #meet {
            flex: 1 1 auto;
            width: 100%;
            height: 100%;
            min-height: 400px;
        }
        @media (max-width: 900px) {
            header, .video-container {
                max-width: 100%;
                padding: 0 8px;
            }
        }
        @media (max-width: 600px) {
            header {
                padding: 18px 4px 0 4px;
            }
            .video-container {
                margin: 0 0 16px 0;
                border-radius: 10px;
            }
        }
    </style>
</head>
<body>
    <header>
        <a href="<?php echo ROOT?>/admin" style="text-decoration: none;">
            <button class="go-back">Go Back</button>
        </a>
    </header>
    <div class="video-container">
        <div id="meet"></div>
    </div>

    <script src='https://meet.jit.si/external_api.js'></script>
    <script>
        const domain = 'meet.jit.si';
        const options = {
            roomName: '<?php echo htmlspecialchars($data['roomName']); ?>',
            width: '100%',
            height: document.querySelector('.video-container').offsetHeight,
            parentNode: document.querySelector('#meet'),
            configOverwrite: {
                startWithAudioMuted: false,
                startWithVideoMuted: false,
            },
            interfaceConfigOverwrite: {
                TOOLBAR_BUTTONS: [
                    'microphone', 'camera', 'chat', 'fullscreen', 'hangup', 'settings', 'raisehand'
                ],
            }
        };
        const api = new JitsiMeetExternalAPI(domain, options);

        
        function resizeJitsi() {
            const container = document.querySelector('.video-container');
            api.resize(container.offsetWidth, container.offsetHeight);
        }
        window.addEventListener('resize', resizeJitsi);
    </script>
</body>
</html>

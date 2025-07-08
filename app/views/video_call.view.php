<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Video Call</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

  <header class="p-4 bg-white shadow flex items-center max-w-7xl mx-auto w-full">
  <a href="javascript:history.back()" class="inline-block">
  <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
    ← Go Back
  </button>
</a>

  </header>

  <main class="flex-grow max-w-7xl mx-auto w-full p-4">
    <div class="video-container rounded-lg shadow bg-black" style="height: 75vh;">
      <div id="meet" class="w-full h-full"></div>
    </div>
  </main>

  <script src="https://meet.jit.si/external_api.js"></script>
  <script>
    const domain = 'meet.jit.si';
    const container = document.querySelector('.video-container');
    const meetNode = document.querySelector('#meet');

    const options = {
      roomName: '<?php echo htmlspecialchars($data['roomName']); ?>',
      width: '100%',
      height: container.clientHeight,
      parentNode: meetNode,
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
      api.resize(container.clientWidth, container.clientHeight);
    }
    window.addEventListener('resize', resizeJitsi);
  </script>
</body>
</html>

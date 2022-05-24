<!DOCTYPE html>
<html>

<head>
  <script src='https://8x8.vc/external_api.js' async></script>
  <style>
    html,
    body,
    #jaas-container {
      height: 100%;
    }

  </style>
  <script type="text/javascript">
    window.onload = () => {
      const api = new JitsiMeetExternalAPI("8x8.vc", {
        roomName: "vpaas-magic-cookie-24c3220c2b2548d89c2275c54db45d11/MyPrivateRoom",
        jwt: "{{ $token }}",
        parentNode: document.querySelector('#jaas-container'),
        configOverwrite: {
          defaultRemoteDisplayName: 'Custom Name'
        }
      })
    }
  </script>
</head>

<body>
  <div id="jaas-container" />
</body>

</html>


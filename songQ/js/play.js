    const play = ({
  spotify_uri,
  playerInstance: {
    _options: {
      getOAuthToken,
      id
    }
  }
}) => {
  getOAuthToken(access_token => {
    fetch(`https://api.spotify.com/v1/me/player/play?device_id=10e81ad2ac4570c16c6b0a8ed169cb07cef8c755`, {
      method: 'PUT',
      body: JSON.stringify({ uris: [spotify_uri] }),
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer BQDe9NXQ3gwWrYrUTown-MDbqjEHJYXUzM4fQaKcOi5iuccynRgd4r1l6s7B7HL_TTDkZGG4UPPjf0woCxCORKDqxgjQJ8q9hoV6hVgb_65I8QormetfNUpugPTqiBgtaUTjjwqVXXG6EMywKZXXyXn6diDDoKflgUFWlV-pAztoLSdBv5ClMOWtZw`
      },
    });
  });
};

play({
  playerInstance: new Spotify.Player({ name: "..." }),
  spotify_uri: 'spotify:track:3mi7RsNkaXOMfcXqjxXGzB',
});
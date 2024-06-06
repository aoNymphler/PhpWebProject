const games = [
    {
      image: '././assets/center/c11.PNG',
      description: 'GTA 5 by Rockstar Games:<br> Explore the vast world<br> of GTA 5.'
    },
    {
      image: '././assets/center/c9.PNG',
      description: 'Lost Ark by Smilegate:<br> Begin your epic journey<br> in Lost Ark.'
    },
    {
      image: '././assets/center/c33.PNG',
      description: 'Fortnite by Epic Games: <br> Build and battle in the<br> Fortnite world.'
    },
    {
      image: '././assets/center/c4.PNG',
      description: 'CS by Valve: Test your<br> skills in Counter-Strike<br> by Valve.'
    },
    {
      image: '././assets/center/c5.PNG',
      description: 'PUBG by PUBG Corp:<br>Be the last one standin<br> in PUBG.'
    }
  ];
  
  const container = document.getElementById('centerSlider');
  
  games.forEach(game => {
    const gameElement = document.createElement('div');
    gameElement.className = 'imagesdivpositionmainbox1';
    gameElement.innerHTML = `
      <div class="areaBox">
        <img src="${game.image}" class="imagebox1">
        <p class="font10">${game.description}</p><br>
      </div>
    `;
    container.appendChild(gameElement);
  });
  

  
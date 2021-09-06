
<p align="center">
  <a href="https://github.com/shutupflanders/pokemon-tcg-collection-api">
    <img src="images/logo.png" alt="Logo" width="80" height="80" />
  </a>

<h3 align="center">Pokemon TCG Collection API</h3>

  <p align="center">
    Syncs your Pokemon TCG Collection from <a href="https://www.tcgcollector.com/">Pokemon TCG Collector</a>
    <br />
    <a href="https://github.com/shutupflanders/pokemon-tcg-collection-api"><strong>Explore the docs »</strong></a>
    <br />
    ·
    <a href="https://github.com/shutupflanders/pokemon-tcg-collection-api/issues">Report Bug</a>
    ·
    <a href="https://github.com/shutupflanders/pokemon-tcg-collection-api/issues">Request Feature</a>
  </p>
</p>



<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary><h2 style="display: inline-block">Table of Contents</h2></summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgements">Acknowledgements</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

Tired of going back and forth between eBay and TCGCollector? not just me? Then look no further!

Pair this with the [PokEbay Chrome Extension](https://github.com/shutupflanders/pokebay-chrome-extension) and you
can wave goodbye to that strenuous CTRL+Tabbing!

This duo of fantastic packages will let you know if you need the card you're looking at in the eBay listings page
by doing a simple lookup of the `Name and Number/Total`.

<em>Obviously it's not fool-proof, but it does what it can to save you looking up your collection manually.</em>

### Built With

* [Laravel](https://laravel.com/)
* [Docker](https://www.docker.com/)
* [MySQL](https://www.mysql.com/)

<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple steps.

### Prerequisites

This is an example of how to list things you need to use the software and how to install them.
* [Docker Compose](https://docs.docker.com/compose/install/) must be installed.
* Export your [TCG Collector](https://www.tcgcollector.com/) collection <em>This can be done
by logging in, clicking your username in the top right and then "Export Collection".</em> Once done 
you should have a file called `tcgcollector-*.csv` - make a note of the path to this file for later.

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/shutupflanders/pokemon-tcg-collection-api.git
   ```
2. Copy/Rename `.env.example` to `.env` and modify the `Override Settings` taking special note
of the `POKEAPI_KEY` and `COLLECTION_CSV_PATH`
3. Navigate your terminal to the repository root directory and run `docker-compose up`

**Note:** the initial setup can take upwards of 20 minutes due to it seeding all the sets and cards to the
local database, watch the container logs and you'll see how it's progressing.



<!-- USAGE EXAMPLES -->
## Usage

Once everything is up and running, install the [PokEbay Chrome Extension](https://github.com/shutupflanders/pokebay-chrome-extension)
and navigate to your local eBay website and make sure to choose the Card Type "Pokémon", this plugin
will only work on these listing pages.

If all is well, you should see the titles of the listings change to red or green (red means the card was not found in your collection,
 green means you potentially have this card already)

And that's all there is to it!


<!-- ROADMAP -->
## Roadmap

See the [open issues](https://github.com/shutupflanders/pokemon-tcg-collection-api/issues) for a list of proposed features (and known issues).



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.



<!-- CONTACT -->
## Contact

Martin Brooksbank - [@TAiNusMaximus](https://twitter.com/TAiNusMaximus)

Project Link: [https://github.com/shutupflanders/pokemon-tcg-collection-api](https://github.com/shutupflanders/pokemon-tcg-collection-api)

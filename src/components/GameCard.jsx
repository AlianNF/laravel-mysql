import Card from 'react-bootstrap/Card';
import { Row, Col, Container } from 'react-bootstrap';
import { Link } from 'react-router-dom';
import './GameCard.css';

function GameCard({game}) {
  let genres = game.genres;


try {
  genres = JSON.parse(genres);
} catch (error) {
  console.error('Error parsing genres:', error);
  genres = []; 
}


const genresString = Array.isArray(genres) ? genres.join(', ') : 'No genres available';
    return (
       <Container>
          <Link to={`/game/${game.id}`} state={{ game }}>
            <Card className='gamecard'>
              <Card.Img variant="top" src={game.imageUrl} />
              <Card.Body>
                <Card.Title>{game.title}</Card.Title>
                <Container>
                  <Row>
                    <Col xs={6} className='Border-Col'  >
                      {game.releaseDate}
                    </Col>
                    <Col xs={6} className='Border-Col'>
                      {game.metascore} metascore
                    </Col>
                    <Col xs={12} className='Border-Col' >
                      {genres.join(' - ')}
                    </Col>
                  </Row> 
                </Container>
                
                
              </Card.Body>
            </Card>
          </Link>
        </Container>
        
    );
  }
        
        

export default GameCard;
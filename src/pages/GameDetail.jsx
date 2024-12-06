import { useLocation } from 'react-router-dom';
import { Row, Col, Container, Card, ListGroup } from 'react-bootstrap';
import './GameDetail.css';
import Comments from '../components/comments.jsx';

function GameDetail() {
  const location = useLocation();
  const { game } = location.state || {};

  if (!game) {
    return <p>No game information provided</p>;
  }
  let genres = game.genres;

// Intenta parsear la cadena JSON a un array
try {
  genres = JSON.parse(genres);
} catch (error) {
  console.error('Error parsing genres:', error);
  genres = []; // Si hay un error, asigna un array vacío como valor por defecto
}

// Verifica si genres es un array antes de usar .join()
const genresString = Array.isArray(genres) ? genres.join(', ') : 'No genres available';

  return (
    <>
      <Container className="my-4">
        <Row>
          <Col lg={8} md={7} sm={12} className="mb-4 mb-md-0">
            <iframe
              width="100%"
              height="450"
              src={`https://www.youtube.com/embed/${game.trailer}`}
              frameBorder="0"
              allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
              allowFullScreen
            ></iframe>
          </Col>
          <Col lg={4} md={5} sm={12}>
            <Card>
              <Card.Header as="h5">{game.title}</Card.Header>
              <Card.Body>
                <ListGroup variant="flush">
                  <ListGroup.Item>
                    <strong>Release Date:</strong> {game.releaseDate}
                  </ListGroup.Item>
                  <ListGroup.Item>
                    <strong>Metascore:</strong> {game.metascore}
                  </ListGroup.Item>
                  <ListGroup.Item>
                    <strong>Genres:</strong> {genres.join(', ')}
                  </ListGroup.Item>
                  <ListGroup.Item>
                    <strong>Description:</strong> {game.description}
                  </ListGroup.Item>
                </ListGroup>
              </Card.Body>
            </Card>
          </Col>
        </Row>
      </Container>
      <Container className="my-4">
        <Comments gameId={game.id} />
      </Container>
    </>
  );
}

export default GameDetail;

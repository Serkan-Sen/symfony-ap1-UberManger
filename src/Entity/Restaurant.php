<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RestaurantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: RestaurantRepository::class)]
#[ApiResource]
class Restaurant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse_Postale = null;

    #[ORM\Column]
    private ?int $Tel = null;

    #[ORM\OneToMany(mappedBy: 'restaurant', targetEntity: Menu::class, orphanRemoval: true)]
    private Collection $Menu;

    #[ORM\Column(length: 255)]
    private ?string $Img = null;

    #[ORM\Column(length: 255)]
    private ?string $Logo = null;

    #[ORM\Column(nullable: true,  scale:9 )]
    private ?float  $longitude = null;

    #[ORM\Column(nullable: true,  scale:9)]
    private ?float  $latitude = null;

    

    

    public function __construct()
    {
        $this->Menu = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getAdressePostale(): ?string
    {
        return $this->Adresse_Postale;
    }

    public function setAdressePostale(string $Adresse_Postale): self
    {
        $this->Adresse_Postale = $Adresse_Postale;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->Tel;
    }

    public function setTel(int $Tel): self
    {
        $this->Tel = $Tel;

        return $this;
    }

    /**
     * @return Collection<int, Menu>
     */
    public function getMenu(): Collection
    {
        return $this->Menu;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->Menu->contains($menu)) {
            $this->Menu->add($menu);
            $menu->setRestaurant($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->Menu->removeElement($menu)) {
            // set the owning side to null (unless already changed)
            if ($menu->getRestaurant() === $this) {
                $menu->setRestaurant(null);
            }
        }

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->Img;
    }

    public function setImg(string $Img): self
    {
        $this->Img = $Img;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->Logo;
    }

    public function setLogo(string $Logo): self
    {
        $this->Logo = $Logo;

        return $this;
    }

    public function getLongitude(): ?float 
    {
        return $this->longitude;
    }

    public function setLongitude(?float  $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?float   
    {
        return $this->latitude;
    }

    public function setLatitude(?float  $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLattitude(): ?string
    {
        return $this->lattitude;
    }

    public function setLattitude(?string $lattitude): self
    {
        $this->lattitude = $lattitude;

        return $this;
    }
}

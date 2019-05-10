<?php

namespace MyApp\Application\Service\RentFilm;

use MyApp\Domain\Model\Film\FilmId;
use MyApp\Domain\Model\Member\MemberId;
use MyApp\Domain\Model\Member\MemberRepository;
use MyApp\Domain\Model\Rental\Rental;
use MyApp\Domain\Model\Rental\RentalRepository;

class RentFilmService
{
    private $memberRepostitory;
    private $rentalRepository;

    public function __construct(MemberRepository $memberRepository, RentalRepository $rentalRepository)
    {
        $this->rentalRepository = $rentalRepository;
        $this->memberRepostitory = $memberRepository;
    }

    public function execute(RentFilmCommand $command)
    {
        $member = $this->memberRepostitory->findMemberById(MemberId::fromInt($command->memberId()));
        $rental = $member->rentFilm(FilmId::fromInt($command->filmId()));
        $this->rentalRepository->saveRental($rental);
    }
}
